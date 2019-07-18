<?php


namespace App\Command\Liveticker;


use App\Command\DaemonCommand;
use App\Command\Liveticker\lib\LivetickerCLILogger;
use App\Command\Liveticker\sources\AbstractLivetickerSource;
use App\Command\Liveticker\sources\sportal\Sportal;
use Doctrine\ORM\EntityManagerInterface;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractLivetickerCommand extends DaemonCommand
{
    const MODUS_CIRCULAR = 'circular';
    const MODUS_DAILY = 'daily';

    const SOURCE_SPORTAL = "sportal";
    const SOURCE_OPTA = "opta";

    private $sources = [
        self::SOURCE_SPORTAL => Sportal::class,
    ];

    protected abstract function getModus(): string;

    function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(new LivetickerCLILogger(), $entityManager);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     * @throws ReflectionException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->debug(sprintf("Starting %s daemon process", $this->getName()));
        foreach($this->sources as $source) {
            /** @var AbstractLivetickerSource $instance */
            $instance = $this->createSourceObject($source);
            $instance->execute();
        }
    }

    /**
     * @param $source
     * @return AbstractLivetickerSource|object
     * @throws ReflectionException
     */
    private function createSourceObject($source)
    {
        $class = new ReflectionClass($source);

        return $class->newInstanceArgs([
            $this->logger,
            $this->entityManager,
            $source,
            $this->getModus()
        ]);
    }

    protected function getDaemonClass(): string {
        return parent::class;
    }
}