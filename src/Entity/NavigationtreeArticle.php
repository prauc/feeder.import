<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NavigationtreeArticle
 *
 * @ORM\Table(name="navigationtree_article", indexes={@ORM\Index(name="parent", columns={"parent"})})
 * @ORM\Entity
 */
class NavigationtreeArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="articleId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $articleid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=true)
     */
    private $type;

    /**
     * @var int|null
     *
     * @ORM\Column(name="typeId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $typeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="shortcut", type="string", length=50, nullable=true)
     */
    private $shortcut;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parent", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $parent;

    /**
     * @var bool
     *
     * @ORM\Column(name="versionizer", type="boolean", nullable=false)
     */
    private $versionizer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iphone", type="string", length=0, nullable=true)
     */
    private $iphone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ipad", type="string", length=0, nullable=true)
     */
    private $ipad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="android", type="string", length=0, nullable=true)
     */
    private $android;

    /**
     * @var string|null
     *
     * @ORM\Column(name="win8", type="string", length=0, nullable=true)
     */
    private $win8;

    /**
     * @var string|null
     *
     * @ORM\Column(name="touch", type="string", length=0, nullable=true)
     */
    private $touch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="xml", type="string", length=255, nullable=true)
     */
    private $xml;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;


}
