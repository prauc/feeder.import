<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentarytype
 *
 * @ORM\Table(name="commentarytype")
 * @ORM\Entity
 */
class Commentarytype
{
    /**
     * @var int
     *
     * @ORM\Column(name="commentaryTypeId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentarytypeid;

    /**
     * @var string
     *
     * @ORM\Column(name="sport", type="string", length=0, nullable=false)
     */
    private $sport;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="internal", type="string", length=50, nullable=false)
     */
    private $internal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adevent", type="string", length=50, nullable=true)
     */
    private $adevent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sportal", type="string", length=50, nullable=true)
     */
    private $sportal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gsm", type="string", length=50, nullable=true)
     */
    private $gsm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var bool
     *
     * @ORM\Column(name="push", type="boolean", nullable=false)
     */
    private $push;


}
