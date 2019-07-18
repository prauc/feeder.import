<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", uniqueConstraints={@ORM\UniqueConstraint(name="articleSourceId", columns={"articleSourceId"})})
 * @ORM\Entity
 */
class Article
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
     * @var int|null
     *
     * @ORM\Column(name="keywordId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $keywordid;

    /**
     * @var int
     *
     * @ORM\Column(name="sportId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $sportid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="leagueId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $leagueid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     */
    private $category;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pagename", type="string", length=255, nullable=true)
     */
    private $pagename;

    /**
     * @var string
     *
     * @ORM\Column(name="highline", type="string", length=255, nullable=false)
     */
    private $highline;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", length=255, nullable=false)
     */
    private $headline;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var int
     *
     * @ORM\Column(name="articleSourceId", type="integer", nullable=false)
     */
    private $articlesourceid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=2083, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255, nullable=false)
     */
    private $thumbnail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
