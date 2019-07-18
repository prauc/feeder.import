<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaserimage
 *
 * @ORM\Table(name="teaserimage")
 * @ORM\Entity
 */
class Teaserimage
{
    /**
     * @var int
     *
     * @ORM\Column(name="teaserimageId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $teaserimageid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;


}
