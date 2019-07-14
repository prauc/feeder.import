<?php


namespace App\Command\Liveticker\sources;


use App\Command\Liveticker\exceptions\APINotLoadableException;
use App\Command\Liveticker\lib\LivetickerCLILogger;
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
    const MODUS_CIRCULAR = 'circular';
    const MODUS_DAILY = 'daily';

    protected $logger;
    protected $entityManager;

    private $source;
    private $modus;

    private $httpclient;
    private $serializer;


    protected abstract function getDailyEntrypoint(): array;

    protected abstract function getCircularEntrypoint(): array;

    protected abstract function getSupportedSports(): array;


    public abstract function execute();

    function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager, string $source, string $modus)
    {
        /** @var LivetickerCLILogger $logger */
        $this->logger = $logger;
        $this->logger->setSource($source);

        $this->entityManager = $entityManager;
        $this->source = $source;
        $this->modus = $modus;

        $this->httpclient = HttpClient::create();
        $this->serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder()]);
    }

    protected function getSource() {
        return $this->source;
    }

    protected function getModus() {
        return $this->modus;
    }

    protected function getEntrypoints(String $option): array {
        if($option == self::MODUS_DAILY) {
            return $this->getDailyEntrypoint();
        } elseif($option == self::MODUS_CIRCULAR) {
            return $this->getCircularEntrypoint();
        }

        throw new LogicException("Wrong modus defined. Please choose between `daily` or `circular`");
    }

    protected function crawlData(string $url, string $type): \SimpleXMLElement {
        try {
            if(strlen($url) == 0) {
                throw new APINotLoadableException("no url provided for type {$type}!");
            } else if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                throw new APINotLoadableException("no valid url provided for type {$type}!");
            }

            $response = $this->httpclient->request("GET", $url);
        } catch (TransportExceptionInterface $e) {
            throw new APINotLoadableException("unable to load data for type {$type}");
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