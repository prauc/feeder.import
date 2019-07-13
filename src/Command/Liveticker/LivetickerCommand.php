<?php


namespace App\Command\Liveticker;


use App\Command\DaemonCommand;
use App\Command\Liveticker\sources\AbstractLivetickerSource;
use App\Command\Liveticker\sources\sportal\Sportal;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LivetickerCommand extends DaemonCommand
{
    protected static $defaultName = 'daemon:liveticker';

    private $modus;
    private $sources = [
        "sportal" => Sportal::class,
    ];

    protected function configure()
    {
        parent::configure();

        $this->addOption("modus", "m", InputOption::VALUE_REQUIRED, "Define modus (`daily` or `circular`)");
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        $this->modus = $input->getOption("modus");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->debug("Starting LivetickerCommand");
        foreach($this->sources as $source) {
            /** @var AbstractLivetickerSource $instance */
            $instance = $this->createSourceObject($source);
            $instance->execute($this->modus);
        }
    }

    private function createSourceObject($source): object {
        $class = new \ReflectionClass($source);

        return $class->newInstanceArgs([
            $this->logger,
            $this->entityManager
        ]);
    }
}