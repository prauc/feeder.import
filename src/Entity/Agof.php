<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agof
 *
 * @ORM\Table(name="agof", indexes={@ORM\Index(name="type", columns={"type"})})
 * @ORM\Entity
 */
class Agof
{
    /**
     * @var int
     *
     * @ORM\Column(name="agofId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $agofid;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;


}
