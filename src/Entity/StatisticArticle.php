<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatisticArticle
 *
 * @ORM\Table(name="statistic_article", uniqueConstraints={@ORM\UniqueConstraint(name="_date_articleId", columns={"_date", "articleId"})})
 * @ORM\Entity
 */
class StatisticArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="statisticArticleId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $statisticarticleid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="articleId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $articleid;

    /**
     * @var int
     *
     * @ORM\Column(name="users", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $users;

    /**
     * @var int
     *
     * @ORM\Column(name="sessions", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $sessions;

    /**
     * @var int
     *
     * @ORM\Column(name="pageviews", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $pageviews;


}
