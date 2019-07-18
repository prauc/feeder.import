<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoLocalization
 *
 * @ORM\Table(name="video_localization")
 * @ORM\Entity
 */
class VideoLocalization
{
    /**
     * @var int
     *
     * @ORM\Column(name="videoId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $videoid;

    /**
     * @var int
     *
     * @ORM\Column(name="localizationId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $localizationid;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;


}
