<?php

namespace App\Command;

use App\Command\lib\DaemonObserverService;
use App\Entity\Daemon;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use LongRunning\Core\Cleaner;
use PhpCollection\Map;
use PhpParser\Node\Expr\ShellExec;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\Store\FlockStore;
use Symfony\Component\Lock\Store\SemaphoreStore;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class ObserverCommand extends Command
{
    protected static $defaultName = 'daemon:observer';

    /** @var DaemonObserverService */
    private $daemonObseverService;

    private $pool;


    function __construct(EntityManagerInterface $entityManager)
    {
        $this->daemonObseverService = new DaemonObserverService(self::$defaultName);
        $this->pool = new Map($entityManager->getRepository(Daemon::class)->findAll());

        parent::__construct();
    }

    protected function configure()
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $daemon = 'daemon:liveticker:circular';
        try {
            $process = new Process(["/usr/bin/php", "bin/console " . $daemon]);
            $process->start();
            if(!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            var_dump($process->getOutput());
        } catch (ProcessFailedException $exception) {
            var_dump($exception->getMessage());
        }

    }
}
