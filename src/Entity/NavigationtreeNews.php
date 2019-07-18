<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NavigationtreeNews
 *
 * @ORM\Table(name="navigationtree_news", indexes={@ORM\Index(name="thumbnailId", columns={"thumbnailId"})})
 * @ORM\Entity
 */
class NavigationtreeNews
{
    /**
     * @var int
     *
     * @ORM\Column(name="newsId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $newsid;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shortcut", type="string", length=50, nullable=true)
     */
    private $shortcut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=true)
     */
    private $type;

    /**
     * @var int|null
     *
     * @ORM\Column(name="keywordId", type="integer", nullable=true)
     */
    private $keywordid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sportId", type="integer", nullable=true)
     */
    private $sportid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="leagueId", type="integer", nullable=true)
     */
    private $leagueid;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="smallint", nullable=false)
     */
    private $lft;

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="smallint", nullable=false)
     */
    private $rgt;

    /**
     * @var bool
     *
     * @ORM\Column(name="versionizer", type="boolean", nullable=false)
     */
    private $versionizer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iphone", type="string", length=10, nullable=true)
     */
    private $iphone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipad", type="string", length=10, nullable=true)
     */
    private $ipad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="android", type="string", length=10, nullable=true)
     */
    private $android;

    /**
     * @var string|null
     *
     * @ORM\Column(name="win8", type="string", length=10, nullable=true)
     */
    private $win8;

    /**
     * @var string|null
     *
     * @ORM\Column(name="touch", type="string", length=10, nullable=true)
     */
    private $touch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="xml", type="string", length=255, nullable=true)
     */
    private $xml;

    /**
     * @var int|null
     *
     * @ORM\Column(name="thumbnailId", type="integer", nullable=true)
     */
    private $thumbnailid;


}
