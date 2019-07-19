<?php


namespace App\Command\lib;


use App\Entity\Daemon;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class DaemonObserverService
{
    /** @var LoggerInterface */
    private $logger;

    /** @var string */
    private $name;

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var Daemon */
    private $daemon;

    function __construct(string $name)
    {
        $this->name = $name;
    }

    public function injectDatabaseLogging(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
        $daemon = $entityManager->getRepository(Daemon::class)->findOneBy([
            "name" => $this->name
        ]);

        if($daemon === null) {
            $daemon = new Daemon;
            $daemon->setName($this->name);

            $entityManager->persist($daemon);
        }

        $daemon->setStartDatetime(new DateTime);
        $this->daemon = $daemon;
    }

    public function injectConsoleLogging(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function update(): string {
        $memory = self::convert(memory_get_usage(true));

        if($this->logger !== null) {
            $this->logger->info($memory);
        }

        if($this->daemon !== null) {
            $this->daemon->setMemory($memory);
            $this->daemon->setUpdateDatetime(new DateTime);
            $this->entityManager->flush();
        }

        return $memory;
    }

    private static function convert($size) {
        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }
}