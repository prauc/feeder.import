<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localization
 *
 * @ORM\Table(name="localization")
 * @ORM\Entity
 */
class Localization
{
    /**
     * @var int
     *
     * @ORM\Column(name="localizationId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $localizationid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;


}
