<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentary
 *
 * @ORM\Table(name="commentary", uniqueConstraints={@ORM\UniqueConstraint(name="matchId_matchSortId", columns={"matchId", "matchSortId"})}, indexes={@ORM\Index(name="commentaryTypeId", columns={"commentaryTypeId"}), @ORM\Index(name="matchId", columns={"matchId"})})
 * @ORM\Entity
 */
class Commentary
{
    /**
     * @var int
     *
     * @ORM\Column(name="commentaryId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentaryid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="commentaryTypeId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $commentarytypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="minute", type="string", length=50, nullable=false)
     */
    private $minute;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="matchId", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $matchid;

    /**
     * @var float
     *
     * @ORM\Column(name="matchSortId", type="float", precision=10, scale=0, nullable=false)
     */
    private $matchsortid;


}
