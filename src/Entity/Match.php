<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 * @ORM\Table(name="`match`")
 */
class Match
{
    const SOURCE_SPORTAL = "sportal";
    const SOURCE_OPTA = "opta";

    const TYPE_SINGLE = "single";
    const TYPE_CONFERENCE = "conference";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
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
    private $start_datetime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $end_datetime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentary_url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statistics_url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\League")
     * @ORM\JoinColumn(nullable=false)
     */
    private $league;

    /**
     * @ORM\Column(type="integer")
     */
    private $season;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headline;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $sourcematch_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MatchStatus", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchstatus;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStartDatetime(): ?DateTimeInterface
    {
        return $this->start_datetime;
    }

    public function setStartDatetime(DateTimeInterface $start_datetime): self
    {
        $this->start_datetime = $start_datetime;

        return $this;
    }

    public function getEndDatetime(): ?DateTimeInterface
    {
        return $this->end_datetime;
    }

    public function setEndDatetime(?DateTimeInterface $end_datetime): self
    {
        $this->end_datetime = $end_datetime;

        return $this;
    }

    public function getCommentaryUrl(): ?string
    {
        return $this->commentary_url;
    }

    public function setCommentaryUrl(?string $commentary_url): self
    {
        $this->commentary_url = $commentary_url;

        return $this;
    }

    public function getStatisticsUrl(): ?string
    {
        return $this->statistics_url;
    }

    public function setStatisticsUrl(?string $statistics_url): self
    {
        $this->statistics_url = $statistics_url;

        return $this;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function setLeague(?League $league): self
    {
        $this->league = $league;

        return $this;
    }

    public function getSeason(): ?int
    {
        return $this->season;
    }

    public function setSeason(int $season): self
    {
        $this->season = $season;

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

    public function getSourcematchId(): ?string
    {
        return $this->sourcematch_id;
    }

    public function setSourcematchId(string $sourcematch_id): self
    {
        $this->sourcematch_id = $sourcematch_id;

        return $this;
    }

    public function getMatchstatus(): ?MatchStatus
    {
        return $this->matchstatus;
    }

    public function setMatchstatus(MatchStatus $matchstatus): self
    {
        $this->matchstatus = $matchstatus;

        return $this;
    }
}
