<?php


namespace App\Command\Liveticker\sources;


use App\Command\Liveticker\exceptions\APINotLoadableException;
use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;
use App\Command\Liveticker\sources\sportal\sports\exceptions\SportNotSupportedException;
use App\Command\Liveticker\sources\sportal\sports\SportInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

abstract class AbstractLivetickerSource
{
    const CIRCULAR = 'circular';
    const DAILY = 'daily';

    protected $logger;
    protected $entityManager;

    private $httpclient;
    private $serializer;


    protected abstract function getDailyEntrypoint(): array;

    protected abstract function getCircularEntrypoint(): array;

    protected abstract function getSupportedSports(): array;


    public abstract function execute(String $modus);

    function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        $this->logger = $logger;
        $this->entityManager = $entityManager;
        $this->httpclient = HttpClient::create();
        $this->serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder()]);
    }

    protected function getEntrypoints(String $option): array {
        if($option == self::DAILY) {
            return $this->getDailyEntrypoint();
        } elseif($option == self::CIRCULAR) {
            return $this->getCircularEntrypoint();
        }

        throw new LogicException("Wrong modus defined. Please choose between `daily` or `circular`");
    }

    protected function crawlData(string $url): \SimpleXMLElement {
        try {
            if(strlen($url) == 0) {
                throw new APINotLoadableException("no url provided!");
            } else if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                throw new APINotLoadableException("no valid url provided!");
            }

            $response = $this->httpclient->request("GET", $url);
        } catch (TransportExceptionInterface $e) {
            throw new APINotLoadableException("unable to load data");
        }

        return simplexml_load_string($response->getContent());
    }

    protected function deserializeData(\SimpleXMLElement $element, String $class): SourceEntityInterface {
        return $this->serializer->deserialize($element->asXML(), $class, 'xml');
    }

    protected function getSportBySportid(string $sportid): SportInterface
    {
        $sports = $this->getSupportedSports();
        if($this->isSupportedSport($sportid)) {
            $sport = $sports[$sportid];
            $class = new \ReflectionClass($sport);

            /** @var SportInterface $instance */
            $instance = $class->newInstance();
            return $instance;
        }
    }

    protected function isSupportedSport(string $sportid): bool {
        if(!array_key_exists($sportid, $this->getSupportedSports())) {
            throw new SportNotSupportedException(sprintf('Import process for sport %s is not supported', $sportid));
        }

        return true;
    }
}