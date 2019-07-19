<?php


namespace App\Command\Liveticker\sources\sportal\sports;


use App\Command\lib\XMLtoObjectTrait;
use App\Command\Liveticker\AbstractLivetickerCommand;
use App\Command\Liveticker\exceptions\MatchStatusNotFoundException;
use App\Command\Liveticker\sources\sportal\entities\soccer\commentary\XML_COMMENTARY;
use App\Command\Liveticker\sources\sportal\entities\soccer\statistics\XML_FOOTBALL;
use App\Command\Liveticker\sources\sportal\entities\soccer\statistics\XML_DOCUMENT;
use App\Command\Liveticker\sources\sportal\entities\soccer\statistics\XML_MATCHCENTRE;
use App\Entity\Commentary;
use App\Entity\Match;
use App\Entity\MatchSoccer;
use App\Entity\MatchSportInterface;
use App\Entity\MatchStatus;
use App\Entity\Sport;
use App\Entity\Team;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use SimpleXMLElement;

class Soccer implements SportInterface
{
    use XMLtoObjectTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function generateMatchSportEntity(Match $match, SimpleXMLElement $statistics, SimpleXMLElement $commentary): MatchSportInterface
    {
        /** @var MatchSportInterface $match_soccer */
        $match_soccer = $this->entityManager->getRepository(MatchSoccer::class)->findOneBy([
            "parent" => $match
        ]);

        if($match_soccer === null) {
            $match_soccer = new MatchSoccer;
            $match_soccer->setParent($match);
        }

        /** @var XML_MATCHCENTRE $matchcentre */
        if (!empty($statistics->FOOTBALL)) {
            $matchcentre = $this->deserializeData($statistics->FOOTBALL->MATCHCENTRE, XML_MATCHCENTRE::class);
        }

        if($hero = $this->getTeam($matchcentre->getTEAM()[0], $match)) {
            $match_soccer->setHero($hero);
        };

        if($villain = $this->getTeam($matchcentre->getTEAM()[1], $match)) {
            $match_soccer->setVillain($villain);
        }

        $match->setHash($this->getHash($hero, $villain, $match->getStartDatetime()));

        /** @var ArrayCollection $commentary */
        $commentary = $this->getCommentary($commentary, $match);
        if(count($commentary) > 0) {
            foreach($commentary as $comment) {
                $this->entityManager->persist($comment);
            }
        }

        $match_soccer->setHalftimeResult($this->getResult(
            $matchcentre->getTEAM()[0]["SCORE"]["@ht"],
            $matchcentre->getTEAM()[1]["SCORE"]["@ht"]
        ));

        $match_soccer->setResult($this->getResult(
            $matchcentre->getTEAM()[0]["SCORE"]["@ft"],
            $matchcentre->getTEAM()[1]["SCORE"]["@ft"]
        ));

        return $match_soccer;
    }

    /**
     * @param SimpleXMLElement $statistics
     * @param SimpleXMLElement $commentary
     * @param Sport $sport
     * @return MatchStatus
     * @throws MatchStatusNotFoundException
     */
    public function getStatus(SimpleXMLElement $statistics, SimpleXMLElement $commentary, Sport $sport): MatchStatus
    {
        /** @var XML_FOOTBALL $football */
        if (!empty($statistics->FOOTBALL)) {
            $football = $this->deserializeData($statistics->FOOTBALL, XML_FOOTBALL::class);
        }
        $matchstatus = $football->getMATCHCENTRE()['@currentstatus'];

        /** @var MatchStatus $status */
        $status = $this->entityManager->getRepository(MatchStatus::class)->findOneBy([
            "sport" => $sport,
            "sportal" => $matchstatus
        ]);

        if($status === null) {
            throw new MatchStatusNotFoundException(sprintf("match status `%s` not found!", $matchstatus));
        }

        return $status;
    }

    public function getSourceMatchid(SimpleXMLElement $statistics): string
    {
        /** @var XML_DOCUMENT $document */
        if (!empty($statistics->FOOTBALL)) {
            $document = $this->deserializeData($statistics->FOOTBALL->DOCUMENT, XML_DOCUMENT::class);
        }
        return $document->getIDENTIFIER()["@id"];
    }

    private function getTeam($team_data, Match $match): Team
    {
        $team = $this->entityManager->getRepository(Team::class)->findOneBy([
            AbstractLivetickerCommand::SOURCE_SPORTAL => $team_data["@id"]
        ]);

        if($team === null) {
            $team = new Team;
            $team->setLeague($match->getLeague());
            $team->setName($team_data["@name"]);
            $team->setSportal($team_data["@id"]);
            $team->setThumbnail($team_data["IMAGE"]);

            $this->entityManager->persist($team);
        }

        return $team;
    }

    private function getResult($hero, $villain): string
    {
        return sprintf("%s : %s", $hero, $villain);
    }

    private function getCommentary(SimpleXMLElement $commentary, Match $match): ArrayCollection
    {
        $commentary_arraycollection = new ArrayCollection();
        /** @var XML_COMMENTARY $commentary_list */
        if (!empty($commentary->COMMENTARY)) {
            $commentary_list = $this->deserializeData($commentary->COMMENTARY, XML_COMMENTARY::class);
            $comments = is_array($commentary_list->getCOMMENT() ? $commentary_list->getCOMMENT() : array($commentary_list->getCOMMENT()));
            foreach($comments as $node) {
                $sort_id = $node;

                $comment = $this->entityManager->getRepository(Commentary::class)->findOneBy([
                    "match" => $match,
                    "sort_id" => $sort_id
                ]);

                if($comment === null) {
                    $comment = new Commentary;
                    $comment->setMatch($match);
                    $comment->setSortId($sort_id);
                }

                $comment->setMinute($node["@time"]);
                $comment->setStatus(null);
                $comment->setComment($node["#"]);

                if(!$commentary_arraycollection->contains($comment)) {
                    $commentary_arraycollection->add($comment);
                }
            }
        }

        return $commentary_arraycollection;
    }

    public function getHash(Team $hero, Team $villain, DateTimeInterface $dateTime): string
    {
        return sprintf("%s:%s:%s", date_format($dateTime, "Y-m-d"), $hero->getId(), $villain->getId());
    }
}