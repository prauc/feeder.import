<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Home
 *
 * @ORM\Table(name="home", uniqueConstraints={@ORM\UniqueConstraint(name="display_internal", columns={"display", "internal"})})
 * @ORM\Entity
 */
class Home
{
    /**
     * @var string
     *
     * @ORM\Column(name="homeId", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $homeid;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", length=255, nullable=false)
     */
    private $headline;

    /**
     * @var string
     *
     * @ORM\Column(name="teaserText", type="string", length=255, nullable=false)
     */
    private $teasertext;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255, nullable=false)
     */
    private $thumbnail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceThumbnail", type="string", length=255, nullable=true)
     */
    private $sourcethumbnail;

    /**
     * @var bool
     *
     * @ORM\Column(name="playbutton", type="boolean", nullable=false)
     */
    private $playbutton;

    /**
     * @var string
     *
     * @ORM\Column(name="display", type="string", length=0, nullable=false)
     */
    private $display;

    /**
     * @var int
     *
     * @ORM\Column(name="internal", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $internal;

    /**
     * @var string
     *
     * @ORM\Column(name="etag", type="string", length=50, nullable=false)
     */
    private $etag;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
