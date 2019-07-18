<?php


namespace App\Command;



use App\Command\Liveticker\exceptions\DaemonAlreadyRunningException;
use App\Command\Liveticker\lib\LivetickerCLILogger;
use App\Entity\Daemon;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

abstract class DaemonCommand extends Command
{
    use LockableTrait;

    private $sleep;
    private $force;

    protected $logger;
    protected $entityManager;

    /** @var Stopwatch */
    private $stopwatch;

    /** @var Daemon */
    private $daemon;

    protected abstract function getDaemonClass(): string;

    function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        /** @var LivetickerCLILogger $logger */
        $this->logger = $logger;
        $this->logger->setSource($this->getDaemonClass());
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this->stopwatch = new Stopwatch();
        $this->stopwatch->start($this->getName());

        /** @var Daemon $daemon */
        $daemon = $this->entityManager->getRepository(Daemon::class)->findOneBy([
            "name" => $this->getName()
        ]);

        if($daemon === null) {
            $daemon = new Daemon();
            $daemon->setName($this->getName());

            $this->entityManager->persist($this->daemon);
        }

        $daemon->setStartDatetime(new DateTime());

        $this->daemon = $daemon;
        $this->updateDaemonStatistics();

        $this->addOption("sleep", "s", InputOption::VALUE_REQUIRED, "Define sleep of longrunning process", -1);
        $this->addOption("force", null, InputOption::VALUE_OPTIONAL, "Execute daemon, even if it's already running in another process", false);
    }

    protected function updateDaemonStatistics()
    {
        $lap = $this->stopwatch->lap($this->getName());
        $memory = sprintf("%s MiB", $lap->getMemory() / 1024 / 1024);

        $this->logger->info($memory);
        $this->daemon->setMemory($memory);
        $this->daemon->setUpdateDatetime(new DateTime());

        $this->entityManager->flush();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws Exception
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->sleep = $input->getOption("sleep");
        $this->force = $input->getOption("force");

        $return = 0;

        do {
            try {
                if($this->lock() == false && $this->force === false) {
                    throw new DaemonAlreadyRunningException("Daemon is already running in another process!");
                }

                $this->logger->setSource($this->getDaemonClass());
                $this->logger->debug("Logging via Monolog");
                $return = parent::run($input, $output);

                if($this->sleep > 0) {
                    $this->logger->setSource($this->getDaemonClass());
                    $this->logger->debug(sprintf("Sleeping now for %d sec", $this->sleep));
                    $this->updateDaemonStatistics();

                    sleep($this->sleep);
                    $this->release();
                }
            } catch (DaemonAlreadyRunningException $e) {
                $this->logger->info($e->getMessage());
                break;
            }
        } while(true);

        $this->release();

        return $return;
    }
}