<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\Store\FlockStore;
use Symfony\Component\Lock\Store\SemaphoreStore;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class DaemonController extends AbstractController
{
    function __construct($daemonYaml)
    {
        //var_dump(Yaml::parseFile($daemonYaml));
    }

    /**
     * @Route("/daemon", name="daemon_list")
     * @return Response
     */
    public function list() {
        if(SemaphoreStore::isSupported()) {
            $store = new SemaphoreStore();
        } else {
            $store = new FlockStore();
        }

        $lock = (new LockFactory($store))->createLock("daemon:liveticker:circular");

        return new Response($lock->acquire() ? "ja" : "nein");
    }
}