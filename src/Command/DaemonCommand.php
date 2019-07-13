<?php


namespace App\Command;


use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class DaemonCommand extends Command
{
    private $sleep;

    protected $logger;
    protected $entityManager;

    function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->logger = $logger;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->addOption("sleep", "s", InputOption::VALUE_REQUIRED, "Define sleep of longrunning process", -1);
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->sleep = $input->getOption("sleep");
    }

    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->logger->debug("Logging via Monolog");
        $return = parent::run($input, $output);

        if($this->sleep > 0) {
            $this->logger->debug(sprintf("Sleeping now for %d sec", $this->sleep));
            sleep($this->sleep);

            $return = $this->run($input, $output);
        }

        return $return;
    }
}