<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videocategory
 *
 * @ORM\Table(name="videocategory")
 * @ORM\Entity
 */
class Videocategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="videoCategoryId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $videocategoryid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="leagueId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $leagueid;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=50, nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="backendname", type="string", length=100, nullable=false)
     */
    private $backendname;

    /**
     * @var float
     *
     * @ORM\Column(name="sort", type="float", precision=10, scale=0, nullable=false)
     */
    private $sort;


}
