<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player", uniqueConstraints={@ORM\UniqueConstraint(name="sourcePlayerId_teamId", columns={"sourcePlayerId", "teamId"})}, indexes={@ORM\Index(name="teamId", columns={"teamId"}), @ORM\Index(name="gsm", columns={"gsm"})})
 * @ORM\Entity
 */
class Player
{
    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $playerid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="sourcePlayerId", type="integer", nullable=false)
     */
    private $sourceplayerid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="gsm", type="integer", nullable=true)
     */
    private $gsm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="teamId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $teamid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="shirtnumber", type="integer", nullable=true)
     */
    private $shirtnumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;


}
