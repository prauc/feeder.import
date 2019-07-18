<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pushnotification
 *
 * @ORM\Table(name="pushnotification", uniqueConstraints={@ORM\UniqueConstraint(name="type_ident", columns={"type", "hash"})}, indexes={@ORM\Index(name="matchHash", columns={"matchHash"}), @ORM\Index(name="etag", columns={"etag"}), @ORM\Index(name="commentaryId", columns={"commentaryId"}), @ORM\Index(name="userId", columns={"userId"}), @ORM\Index(name="matchId", columns={"matchId"})})
 * @ORM\Entity
 */
class Pushnotification
{
    /**
     * @var int
     *
     * @ORM\Column(name="pushnotificationId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pushnotificationid;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255, nullable=false)
     */
    private $hash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sport", type="string", length=0, nullable=true)
     */
    private $sport;

    /**
     * @var int|null
     *
     * @ORM\Column(name="userId", type="integer", nullable=true)
     */
    private $userid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="matchId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $matchid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="matchHash", type="string", length=255, nullable=true)
     */
    private $matchhash;

    /**
     * @var int|null
     *
     * @ORM\Column(name="commentaryId", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $commentaryid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etag", type="string", length=50, nullable=true)
     */
    private $etag;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", length=100, nullable=false)
     */
    private $headline;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var string|null
     *
     * @ORM\Column(name="messageHash", type="string", length=40, nullable=true, options={"fixed"=true})
     */
    private $messagehash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="messagePlain", type="string", length=255, nullable=true)
     */
    private $messageplain;

    /**
     * @var bool
     *
     * @ORM\Column(name="sent", type="boolean", nullable=false)
     */
    private $sent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reason", type="string", length=255, nullable=true)
     */
    private $reason;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="_created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
