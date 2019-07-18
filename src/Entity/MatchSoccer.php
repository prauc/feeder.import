<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchSoccerRepository")
 */
class MatchSoccer implements MatchSportInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Match", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $parent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $villain;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $halftime_result;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $result;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?Match
    {
        return $this->parent;
    }

    public function setParent(Match $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getHero(): ?Team
    {
        return $this->hero;
    }

    public function setHero(?Team $hero): self
    {
        $this->hero = $hero;

        return $this;
    }

    public function getVillain(): ?Team
    {
        return $this->villain;
    }

    public function setVillain(?Team $villain): self
    {
        $this->villain = $villain;

        return $this;
    }

    public function getHalftimeResult(): ?string
    {
        return $this->halftime_result;
    }

    public function setHalftimeResult(?string $halftime_result): self
    {
        $this->halftime_result = $halftime_result;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): self
    {
        $this->result = $result;

        return $this;
    }
}
