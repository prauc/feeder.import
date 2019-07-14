<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class DaemonController extends AbstractController
{
    function __construct($daemonYaml)
    {
        var_dump(Yaml::parseFile($daemonYaml));
    }

    /**
     * @Route("/daemon", name="daemon_list")
     * @return Response
     */
    public function list() {
        return new Response(\dirname(__DIR__));
    }
}