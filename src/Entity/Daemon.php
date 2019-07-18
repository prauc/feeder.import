<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DaemonRepository")
 */
class Daemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $memory;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_datetime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $start_datetime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMemory(): ?string
    {
        return $this->memory;
    }

    public function setMemory(?string $memory): self
    {
        $this->memory = $memory;

        return $this;
    }

    public function getUpdateDatetime(): ?DateTimeInterface
    {
        return $this->update_datetime;
    }

    public function setUpdateDatetime(?DateTimeInterface $update_datetime): self
    {
        $this->update_datetime = $update_datetime;

        return $this;
    }

    public function getStartDatetime(): ?DateTimeInterface
    {
        return $this->start_datetime;
    }

    public function setStartDatetime(?DateTimeInterface $start_datetime): self
    {
        $this->start_datetime = $start_datetime;

        return $this;
    }
}
