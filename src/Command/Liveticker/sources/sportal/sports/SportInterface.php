<?php


namespace App\Command\Liveticker\sources\sportal\sports;


use App\Entity\Match;
use App\Entity\MatchSportInterface;
use App\Entity\MatchStatus;
use App\Entity\Sport;
use App\Entity\Team;
use DateTimeInterface;
use Doctrine\ORM\EntityManagerInterface;
use SimpleXMLElement;

interface SportInterface
{
    function __construct(EntityManagerInterface $entityManager);

    public function generateMatchSportEntity(Match $match, SimpleXMLElement $statistics, SimpleXMLElement $commentary): MatchSportInterface;

    /**
     * @param SimpleXMLElement $statistics
     * @param SimpleXMLElement $commentary
     * @param Sport $sport
     * @return MatchStatus
     */
    public function getStatus(SimpleXMLElement $statistics, SimpleXMLElement $commentary, Sport $sport): MatchStatus;

    public function getSourceMatchid(SimpleXMLElement $statistics): string;

    public function getHash(Team $hero, Team $villain, DateTimeInterface $dateTime): string;
}