<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devicetype
 *
 * @ORM\Table(name="devicetype")
 * @ORM\Entity
 */
class Devicetype
{
    /**
     * @var int
     *
     * @ORM\Column(name="devicetypeId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $devicetypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="internal", type="string", length=50, nullable=false)
     */
    private $internal;


}
