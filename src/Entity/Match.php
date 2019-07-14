<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    const SOURCE_Sportal = "sportal";
    const SOURCE_GSM = "gsm";

    const TYPE_SINGLE = "single";
    const TYPE_CONFERENCE = "conference";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="matchId")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $source;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $sport;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finishedDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaryUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statisticsUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(string $sport): self
    {

        $this->sport = $sport;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
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

    public function getFinishedDate(): ?\DateTimeInterface
    {
        return $this->finishedDate;
    }

    public function setFinishedDate(?\DateTimeInterface $finishedDate): self
    {
        $this->finishedDate = $finishedDate;

        return $this;
    }

    public function getCommentaryUrl(): ?string
    {
        return $this->commentaryUrl;
    }

    public function setCommentaryUrl(?string $commentaryUrl): self
    {
        $this->commentaryUrl = $commentaryUrl;

        return $this;
    }

    public function getStatisticsUrl(): ?string
    {
        return $this->statisticsUrl;
    }

    public function setStatisticsUrl(?string $statisticsUrl): self
    {
        $this->statisticsUrl = $statisticsUrl;

        return $this;
    }
}
