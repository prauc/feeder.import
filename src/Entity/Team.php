<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\League")
     * @ORM\JoinColumn(nullable=false)
     */
    private $league;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $sportal;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $opta;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $gsm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thumbnail;

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

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function setLeague(League $league): self
    {
        $this->league = $league;

        return $this;
    }

    public function getSportal(): ?string
    {
        return $this->sportal;
    }

    public function setSportal(?string $sportal): self
    {
        $this->sportal = $sportal;

        return $this;
    }

    public function getOpta(): ?string
    {
        return $this->opta;
    }

    public function setOpta(?string $opta): self
    {
        $this->opta = $opta;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(?string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
