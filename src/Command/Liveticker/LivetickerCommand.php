<?php


namespace App\Command\Liveticker;


use App\Command\DaemonCommand;
use App\Command\Liveticker\lib\LivetickerCLILogger;
use App\Command\Liveticker\sources\AbstractLivetickerSource;
use App\Command\Liveticker\sources\sportal\Sportal;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LivetickerCommand extends DaemonCommand
{
    protected static $defaultName = 'daemon:liveticker';

    protected $logger;
    private $modus;
    private $sources = [
        "sportal" => Sportal::class,
    ];

    function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(new LivetickerCLILogger(), $entityManager);
    }

    protected function configure()
    {
        parent::configure();

        $this->addOption("modus", "m", InputOption::VALUE_REQUIRED, "Define modus (`daily` or `circular`)");
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        $this->modus = $input->getOption("modus");
        $this->logger->setModus($this->modus);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->debug("Starting LivetickerCommand");
        foreach($this->sources as $source) {
            /** @var AbstractLivetickerSource $instance */
            $instance = $this->createSourceObject($source);
            $instance->execute();
        }
    }

    private function createSourceObject($source): object {
        $class = new \ReflectionClass($source);

        return $class->newInstanceArgs([
            $this->logger,
            $this->entityManager,
            $source,
            $this->modus
        ]);
    }
}