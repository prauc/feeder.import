<?php


namespace App\Command\Liveticker;


use App\Command\DaemonCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LivetickerCommand extends DaemonCommand
{
    protected static $defaultName = 'daemon:liveticker';

    protected function configure()
    {
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Command Liveticker");
        $output->writeln($input->getOption("sleep"));
    }
}