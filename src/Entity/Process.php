<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="process", uniqueConstraints={@ORM\UniqueConstraint(name="name_type", columns={"name", "type"})})
 * @ORM\Entity
 */
class Process
{
    /**
     * @var int
     *
     * @ORM\Column(name="processId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $processid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pid", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $pid;

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
     * @var string|null
     *
     * @ORM\Column(name="running", type="string", length=0, nullable=true)
     */
    private $running;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="time", type="time", nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var string|null
     *
     * @ORM\Column(name="memory", type="string", length=50, nullable=true)
     */
    private $memory;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="_timestamp", type="datetime", nullable=true)
     */
    private $timestamp;


}
