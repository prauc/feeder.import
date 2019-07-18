<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessMatch
 *
 * @ORM\Table(name="process_match", uniqueConstraints={@ORM\UniqueConstraint(name="matchId", columns={"matchId"})})
 * @ORM\Entity
 */
class ProcessMatch
{
    /**
     * @var int
     *
     * @ORM\Column(name="pid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pid;

    /**
     * @var int
     *
     * @ORM\Column(name="parent_pid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $parentPid;

    /**
     * @var int
     *
     * @ORM\Column(name="matchId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $matchid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="memory", type="string", length=50, nullable=true)
     */
    private $memory;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
