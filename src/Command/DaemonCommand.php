<?php


namespace App\Command;



use App\Command\lib\DaemonLock;
use App\Command\Liveticker\exceptions\DaemonAlreadyRunningException;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Lock\Lock;

abstract class DaemonCommand extends Command
{
    private $sleep;
    private $force;
    private $lockFactory;

    protected $logger;
    protected $entityManager;
    protected $lock;

    function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->logger = $logger;
        $this->entityManager = $entityManager;
        $this->lockFactory = new DaemonLock();
    }

    protected function configure()
    {
        $this->addOption("sleep", "s", InputOption::VALUE_REQUIRED, "Define sleep of longrunning process", -1);
        $this->addOption("force", null, InputOption::VALUE_OPTIONAL, "Execute daemon, even if it's already running in another process", false);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->sleep = $input->getOption("sleep");
        $this->force = $input->getOption("force");
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Exception
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        try {
            /** @var Lock lock */
            $this->lock = $this->lockFactory->createLock($this->getName());
            if(!$this->lock->acquire() && $this->force === false) {
                throw new DaemonAlreadyRunningException("Daemon is already running in another process!");
            }

            $this->logger->debug("Logging via Monolog");
            $return = parent::run($input, $output);

            if($this->sleep > 0) {
                $this->logger->debug(sprintf("Sleeping now for %d sec", $this->sleep));

                sleep($this->sleep);
                $this->lock->release();
                $return = $this->run($input, $output);
            }

            $this->lock->release();
        } catch (DaemonAlreadyRunningException $e) {
            $this->logger->info($e->getMessage());
            return 0;
        }

        return $return;
    }
}