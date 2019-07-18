<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoOld
 *
 * @ORM\Table(name="video_old", uniqueConstraints={@ORM\UniqueConstraint(name="sourceVideoId", columns={"videoSourceId"})})
 * @ORM\Entity
 */
class VideoOld
{
    /**
     * @var int
     *
     * @ORM\Column(name="videoId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $videoid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", length=100, nullable=false)
     */
    private $headline;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255, nullable=false)
     */
    private $thumbnail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="youtube", type="string", length=50, nullable=true)
     */
    private $youtube;

    /**
     * @var string
     *
     * @ORM\Column(name="videoSourceId", type="string", length=50, nullable=false)
     */
    private $videosourceid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
