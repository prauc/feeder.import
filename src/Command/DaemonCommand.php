<?php


namespace App\Command;



use App\Command\lib\DaemonObserverService;
use App\Command\Liveticker\exceptions\DaemonAlreadyRunningException;
use App\Command\Liveticker\lib\LivetickerCLILogger;
use App\Entity\Daemon;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

abstract class DaemonCommand extends Command
{
    use LockableTrait;

    const YAML_DAEMONS = "daemons.yaml";

    /** @var int */
    private $sleep;

    /** @var bool */
    private $force;

    /** @var LivetickerCLILogger */
    protected $logger;

    /** @var EntityManagerInterface */
    protected $entityManager;

    /** @var Daemon */
    private $daemon;

    /** @var DaemonObserverService */
    private $daemonObserverService;

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
        $this->daemonObserverService = new DaemonObserverService(
            $this->getName(),
            $this->logger,
            $this->entityManager
        );

        $this->daemonObserverService->update();


        $this->addOption("sleep", "s", InputOption::VALUE_REQUIRED, "Define sleep of longrunning process", -1);
        $this->addOption("force", null, InputOption::VALUE_OPTIONAL, "Execute daemon, even if it's already running in another process", false);
    }

    private function configureSleep($sleep): int {
        if($sleep > 0) {
            return (int)$sleep;
        }

        $config = sprintf("%s/config/%s", $this->getApplication()->getKernel()->getProjectDir(), self::YAML_DAEMONS);
        $daemons = Yaml::parseFile($config);

        if(array_key_exists(static::class, $daemons['daemons'])) {
            if(array_key_exists('sleep', $daemons['daemons'][static::class])) {
                return $daemons['daemons'][static::class]['sleep'];
            }
        }

        return -1;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws Exception
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->sleep = 100; #$this->configureSleep($input->getOption("sleep"));
        $this->force = false; #$input->getOption("force");

        try {
            if($this->lock() == false && $this->force === false) {
                throw new DaemonAlreadyRunningException("Daemon is already running in another process!");
            }

            $this->logger->setSource($this->getDaemonClass());
            $this->logger->debug("Starting new daemon run");
            parent::run($input, $output);
            $this->logger->debug("daemon run was successful");

            if($this->sleep > 0) {
                $this->logger->setSource($this->getDaemonClass());
                $this->logger->debug(sprintf("Sleeping now for %d sec", $this->sleep));
                $this->daemonObserverService->update();

                sleep($this->sleep);
            }
        } catch (DaemonAlreadyRunningException $e) {
            $this->logger->info($e->getMessage());
        }

        $this->release();

        return 0;
    }
}