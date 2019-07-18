<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchStatusRepository")
 */
class MatchStatus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sport")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sport;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sportal;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $opta;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $gsm;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $headline;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setSportal(string $sportal): self
    {
        $this->sportal = $sportal;

        return $this;
    }

    public function getOpta(): ?string
    {
        return $this->opta;
    }

    public function setOpta(string $opta): self
    {
        $this->opta = $opta;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }
}
