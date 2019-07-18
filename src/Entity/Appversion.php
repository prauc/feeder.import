<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appversion
 *
 * @ORM\Table(name="appversion")
 * @ORM\Entity
 */
class Appversion
{
    /**
     * @var int
     *
     * @ORM\Column(name="appversionId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $appversionid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=50, nullable=false)
     */
    private $version;


}
