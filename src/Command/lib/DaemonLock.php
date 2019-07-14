<?php


namespace App\Command\lib;


use Symfony\Component\Lock\Lock;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\Store\SemaphoreStore;

class DaemonLock
{
    private $factory;

    function __construct()
    {
        $store = new SemaphoreStore();
        $this->factory = new LockFactory($store);
    }

    public function createLock(string $name): Lock {
        $lock = $this->factory->createLock($name);
        var_dump($this->factory, $lock);
        return $lock;
    }
}