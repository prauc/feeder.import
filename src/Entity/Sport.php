<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportRepository")
 */
class Sport
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $advertisment;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $internal;

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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $spox;

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

    public function getAdvertisment(): ?string
    {
        return $this->advertisment;
    }

    public function setAdvertisment(?string $advertisment): self
    {
        $this->advertisment = $advertisment;

        return $this;
    }

    public function getInternal(): ?string
    {
        return $this->internal;
    }

    public function setInternal(string $internal): self
    {
        $this->internal = $internal;

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

    public function getSpox(): ?string
    {
        return $this->spox;
    }

    public function setSpox(?string $spox): self
    {
        $this->spox = $spox;

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
