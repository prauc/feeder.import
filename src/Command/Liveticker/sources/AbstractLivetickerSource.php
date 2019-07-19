<?php


namespace App\Command\Liveticker\sources;


use App\Command\lib\XMLtoObjectTrait;
use App\Command\Liveticker\exceptions\APINotLoadableException;
use App\Command\Liveticker\exceptions\LeagueNotFoundException;
use App\Command\Liveticker\lib\LivetickerCLILogger;
use App\Command\Liveticker\AbstractLivetickerCommand;
use App\Command\Liveticker\exceptions\SportNotSupportedException;
use App\Command\Liveticker\sources\sportal\sports\SportInterface;
use App\Entity\League;
use App\Entity\Sport;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use ReflectionException;
use SimpleXMLElement;
use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

abstract class AbstractLivetickerSource
{
    use XMLtoObjectTrait;

    /** @var LivetickerCLILogger */
    protected $logger;

    /** @var EntityManagerInterface */
    protected $entityManager;

    private $source;
    private $modus;

    private $httpclient;

    protected abstract function getDailyEntrypoint(): array;

    protected abstract function getCircularEntrypoint(): array;

    protected abstract function getSupportedSports(): array;


    public abstract function execute(): void;

    function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager, string $source, string $modus) {
        /** @var LivetickerCLILogger $logger */
        $this->logger = $logger;
        $this->logger->setSource($source);

        $this->entityManager = $entityManager;
        $this->source = $source;
        $this->modus = $modus;

        $this->httpclient = HttpClient::create();
    }

    protected function getSource() {
        return $this->source;
    }

    protected function getModus() {
        return $this->modus;
    }

    protected function getEntrypoints(String $option): array {
        if($option == AbstractLivetickerCommand::MODUS_DAILY) {
            return $this->getDailyEntrypoint();
        } elseif($option == AbstractLivetickerCommand::MODUS_CIRCULAR) {
            return $this->getCircularEntrypoint();
        }

        throw new LogicException("Wrong modus defined. Please choose between `daily` or `circular`");
    }

    /**
     * @param string $url
     * @param string $type
     * @return SimpleXMLElement
     * @throws APINotLoadableException
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    protected function crawlData(string $url, string $type): SimpleXMLElement {
        try {
            if(strlen($url) == 0) {
                throw new APINotLoadableException("no url provided for type {$type}!");
            } else if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                throw new APINotLoadableException("no valid url provided for type {$type}!");
            }

            $response = $this->httpclient->request("GET", $url);
            /** @var SimpleXMLElement $xml */
            $xml = simplexml_load_string($response->getContent());

            if(!($xml instanceof SimpleXMLElement)) {
                throw new APINotLoadableException("unable to process data for {$type}");
            }
        } catch (TransportExceptionInterface | ClientException $e) {
            throw new APINotLoadableException("unable to load data for type {$type}");
        }

        return $xml;
    }

    /**
     * @param string $sportid
     * @return SportInterface
     * @throws ReflectionException
     * @throws SportNotSupportedException
     */
    protected function getSportBySportid(string $sportid): SportInterface {
        $sports = $this->getSupportedSports();
        if($this->isSupportedSport($sportid)) {
            $sport = $sports[$sportid];
            $class = new ReflectionClass($sport);

            /** @var SportInterface $instance */
            $instance = $class->newInstanceArgs([
                $this->entityManager
            ]);

            return $instance;
        }

        return null;
    }

    /**
     * @param string $sportid
     * @return bool
     * @throws SportNotSupportedException
     */
    protected function isSupportedSport(string $sportid): bool {
        if(!array_key_exists($sportid, $this->getSupportedSports())) {
            throw new SportNotSupportedException(sprintf('Import process for sport %s is not supported', $sportid));
        }

        return true;
    }

    /**
     * @param string $source
     * @param string $value
     * @return League
     * @throws LeagueNotFoundException
     */
    protected function getLeagueBySource(string $source, string $value) {
        /** @var League $league */
        $league = $this->entityManager->getRepository(League::class)->findOneBy([
            $source => $value
        ]);

        if($league === null) {
            throw new LeagueNotFoundException(sprintf("Unable to find league %s for source %s", $value, $source));
        }

        return $league;
    }

    /**
     * @param Sport $sport
     * @param string $type
     * @param string $name
     * @param string $source
     * @param string $value
     * @return League
     * @throws LeagueNotFoundException
     */
    protected function createLeagueBySource(Sport $sport, string $type, string $name, string $source, string $value): League {
        $league = $this->entityManager->getRepository(League::class)->findOneBy([
            AbstractLivetickerCommand::SOURCE_SPORTAL => $value
        ]);

        if($league === null) {
            if($source != AbstractLivetickerCommand::SOURCE_SPORTAL){
                throw new LeagueNotFoundException("Only Sportal is allowed to create leagues automatically");
            }

            $league = new League();
            $league->setSport($sport);
            $league->setType($type);
            $league->setName($name);
            $league->setSportal($value);

            $this->entityManager->persist($league);
        }

        return $league;
    }
}