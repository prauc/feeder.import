<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertisingLiveticker
 *
 * @ORM\Table(name="advertising_liveticker", uniqueConstraints={@ORM\UniqueConstraint(name="_trigger", columns={"_trigger", "leagueId"})})
 * @ORM\Entity
 */
class AdvertisingLiveticker
{
    /**
     * @var int
     *
     * @ORM\Column(name="liveId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $liveid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="leagueId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $leagueid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=255, nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="_trigger", type="string", length=255, nullable=false)
     */
    private $trigger;

    /**
     * @var string|null
     *
     * @ORM\Column(name="_triggerData", type="string", length=255, nullable=true)
     */
    private $triggerdata;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=0, nullable=false)
     */
    private $position;

    /**
     * @var bool
     *
     * @ORM\Column(name="sportal", type="boolean", nullable=false)
     */
    private $sportal;

    /**
     * @var bool
     *
     * @ORM\Column(name="gsm", type="boolean", nullable=false)
     */
    private $gsm;

    /**
     * @var bool
     *
     * @ORM\Column(name="times", type="boolean", nullable=false)
     */
    private $times;

    /**
     * @var bool
     *
     * @ORM\Column(name="priority", type="boolean", nullable=false)
     */
    private $priority;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;


}
