<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueRepository")
 */
class League
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
    private $type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sport")
     * @ORM\JoinColumn(name="sportId", nullable=false)
     */
    private $sport;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sportal;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $gsm;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $spox;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

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

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(?string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getSpox(): ?string
    {
        return $this->spox;
    }

    public function setSpox(?string $spox): self
    {
        $this->spox = $spox;

        return $this;
    }
}
