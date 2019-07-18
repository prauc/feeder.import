<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thumbnail
 *
 * @ORM\Table(name="thumbnail")
 * @ORM\Entity
 */
class Thumbnail
{
    /**
     * @var int
     *
     * @ORM\Column(name="thumbnailId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $thumbnailid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;


}
