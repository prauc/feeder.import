<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 *
 * @ORM\Table(name="map", uniqueConstraints={@ORM\UniqueConstraint(name="leagueId_sourceMatchId", columns={"leagueId", "sourceMatchId"})}, indexes={@ORM\Index(name="homeId", columns={"hash"}), @ORM\Index(name="seasonId", columns={"seasonId"}), @ORM\Index(name="leagueId", columns={"leagueId"})})
 * @ORM\Entity
 */
class Map
{
    /**
     * @var int
     *
     * @ORM\Column(name="mapId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mapid;

    /**
     * @var int
     *
     * @ORM\Column(name="seasonId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $seasonid;

    /**
     * @var int
     *
     * @ORM\Column(name="leagueId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $leagueid;

    /**
     * @var int
     *
     * @ORM\Column(name="internalSortId", type="integer", nullable=false)
     */
    private $internalsortid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="gameweek", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $gameweek;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=0, nullable=false)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="sport", type="string", length=0, nullable=false)
     */
    private $sport;

    /**
     * @var string
     *
     * @ORM\Column(name="roundName", type="string", length=100, nullable=false)
     */
    private $roundname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceMatchId", type="string", length=50, nullable=false)
     */
    private $sourcematchid;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", length=255, nullable=false)
     */
    private $headline;

    /**
     * @var int|null
     *
     * @ORM\Column(name="homeId", type="integer", nullable=true)
     */
    private $homeid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="guestId", type="integer", nullable=true)
     */
    private $guestid;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255, nullable=false)
     */
    private $hash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="result", type="string", length=50, nullable=true)
     */
    private $result;

    /**
     * @var bool
     *
     * @ORM\Column(name="retired", type="boolean", nullable=false)
     */
    private $retired = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
