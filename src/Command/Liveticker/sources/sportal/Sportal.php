<?php


namespace App\Command\Liveticker\sources\sportal;


use App\Command\Liveticker\AbstractLivetickerCommand;
use App\Command\Liveticker\exceptions\APINotLoadableException;
use App\Command\Liveticker\exceptions\LeagueNotFoundException;
use App\Command\Liveticker\exceptions\SportNotFoundException;
use App\Command\Liveticker\sources\AbstractLivetickerSource;
use App\Command\Liveticker\sources\sportal\entities\overview\XML_CONTENTITEM;
use App\Command\Liveticker\exceptions\SportNotSupportedException;
use App\Command\Liveticker\sources\sportal\sports\Soccer;
use App\Command\Liveticker\sources\sportal\sports\SportInterface;
use App\Entity\League;
use App\Entity\Match;
use App\Entity\MatchStatus;
use App\Entity\Sport;
use DateTime;
use Exception;
use ReflectionException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;

class Sportal extends AbstractLivetickerSource
{
    public final function getDailyEntrypoint(): array
    {
        return [

        ];
    }

    public final function getCircularEntrypoint(): array
    {
        return [
            "http://partner.sportal.de/spox/generated/over/over.xml"
        ];
    }

    protected function getSupportedSports(): array
    {
        return [
            "fussball" => Soccer::class
        ];
    }

    public function execute(): void
    {
        $entrypoints = $this->getEntrypoints($this->getModus());
        foreach ($entrypoints as $entrypoint) {
            try {
                $data = $this->crawlData($entrypoint, 'overview');
                if (!empty($data->DEFINITION)) {
                    foreach($data->DEFINITION->CONTENTITEM as $node) {
                        try {
                            /** @var XML_CONTENTITEM $contentitem */
                            $contentitem = $this->deserializeData($node, XML_CONTENTITEM::class);

                            $sourcematch_id = $contentitem->getMATCHID();
                            $match = $this->entityManager->getRepository(Match::class)->findOneBy([
                                "sourcematch_id" => $sourcematch_id
                            ]);

                            if($match === null) {
                                $match = new Match;
                            }

                            $sportid = $contentitem->getSPORTID();
                            /** @var SportInterface $sportal_sportinterface */
                            $sportal_sportinterface = $this->getSportBySportid($sportid);

                            $match->setActive(true);
                            $match->setSource(Match::SOURCE_SPORTAL);
                            $match->setSeason(0);
                            $match->setSourcematchid($sourcematch_id);

                            /** @var Sport $sport */
                            $sport = $this->entityManager->getRepository(Sport::class)->findOneBy([
                                'sportal' => $sportid
                            ]);

                            if($sport === null) {
                                throw new SportNotFoundException(sprintf("unable to find sport with sportid `%s`", $sportid));
                            }

                            /** @var League $league */
                            $league = $this->entityManager->getRepository(League::class)->findOneBy([
                                AbstractLivetickerCommand::SOURCE_SPORTAL => sprintf("%s:%s", $contentitem->getSPORTID(), $contentitem->getDIVISIONNAMESEO())
                            ]);

                            if($league === null) {
                                $league = $this->createLeagueBySource($sport, "league", sprintf("%s:%s", $sport->getInternal(), $contentitem->getCOMPETITION()), AbstractLivetickerCommand::SOURCE_SPORTAL, $contentitem->getDIVISIONID());
                            }

                            $date = new DateTime(sprintf("%s %s", $contentitem->getDATE(), $contentitem->getTIME()));

                            $match->setSport($sport->getInternal());
                            $match->setType(Match::TYPE_SINGLE);
                            $match->setStartDatetime($date);
                            $match->setLeague($league);
                            $match->setHeadline($contentitem->getHEADLINE());

                            if($statistics = $this->crawlData($contentitem->getGAMEINFO(), "statistics")) {
                                $match->setStatisticsUrl($contentitem->getGAMEINFO());
                            }

                            if($commentary = $this->crawlData($contentitem->getCOMMENTARY(), "commentary")) {
                                $match->setCommentaryUrl($contentitem->getCOMMENTARY());
                            }

                            /** @var MatchStatus $status */
                            if($status = $sportal_sportinterface->getStatus($statistics, $commentary, $sport)) {
                                $match->setMatchstatus($status);
                            }

                            $matchsport = $sportal_sportinterface->generateMatchSportEntity($match, $statistics, $commentary);

                            $this->entityManager->persist($matchsport);
                            $this->entityManager->persist($match);

                            $this->entityManager->flush();
                            $this->logger->info(sprintf("Match `%s` [sourcematch_id: %s] successfully imported / updated", $match->getHeadline(), $match->getSourcematchId()));
                        } catch (SportNotSupportedException | SportNotFoundException | LeagueNotFoundException $e) {
                            $this->logger->debug($e->getMessage());
                            continue;
                        } catch (APINotLoadableException $e) {
                            $this->logger->error($e->getMessage(), [
                                "sport" => $contentitem->getSPORT(),
                                "sourcematch_id" => $contentitem->getMATCHID()
                            ]);
                            continue;
                        } catch (ReflectionException $e) {
                        } catch (Exception $e) {
                        }
                    }
                }
            } catch (APINotLoadableException $e) {
            } catch (ClientExceptionInterface $e) {
            } catch (RedirectionExceptionInterface $e) {
            } catch (ServerExceptionInterface $e) {
            }
        }
    }
}