<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackendSessions
 *
 * @ORM\Table(name="backend_sessions", indexes={@ORM\Index(name="ci_sessions_timestamp", columns={"timestamp"})})
 * @ORM\Entity
 */
class BackendSessions
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=128, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=45, nullable=false)
     */
    private $ipAddress;

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $timestamp = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="blob", length=65535, nullable=false)
     */
    private $data;


}
