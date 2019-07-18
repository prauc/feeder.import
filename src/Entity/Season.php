<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity
 */
class Season
{
    /**
     * @var int
     *
     * @ORM\Column(name="seasonId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $seasonid;

    /**
     * @var string
     *
     * @ORM\Column(name="season", type="string", length=50, nullable=false)
     */
    private $season;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=4, nullable=false)
     */
    private $year;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';


}
