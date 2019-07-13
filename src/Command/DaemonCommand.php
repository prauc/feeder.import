<?php


namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class DaemonCommand extends Command
{
    private $sleep;

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
        $output->writeln("run method");
        $return = parent::run($input, $output);

        if($this->sleep > 0) {
            $output->writeln("sleep for seconds");
            sleep($this->sleep);

            $return = $this->run($input, $output);
        }

        return $return;
    }
}