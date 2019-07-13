<?php


namespace App\Command\Liveticker\sources\sportal;


use App\Command\Liveticker\exceptions\APINotLoadableException;
use App\Command\Liveticker\sources\AbstractLivetickerSource;
use App\Command\Liveticker\sources\sportal\entities\overview\Contentitem;
use App\Command\Liveticker\sources\sportal\sports\exceptions\SportNotSupportedException;
use App\Command\Liveticker\sources\sportal\sports\Soccer;
use App\Entity\Match;
use App\Entity\Sport;

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

    public function execute(String $modus)
    {
        $entrypoints = $this->getEntrypoints($modus);
        foreach ($entrypoints as $entrypoint) {
            try {
                $data = $this->crawlData($entrypoint);
                foreach($data->DEFINITION->CONTENTITEM as $node) {
                    $match = new Match();

                    try {
                        /** @var Contentitem $contentitem */
                        $contentitem = $this->deserializeData($node, Contentitem::class);

                        $sportid = $contentitem->getSPORTID();
                        $this->isSupportedSport($sportid);

                        $match->setActive(true);
                        $match->setSource(Match::SOURCE_Sportal);

                        /** @var Sport $sport */
                        $sport = $this->entityManager->getRepository(Sport::class)->findOneBy([
                            'sportal' => $sportid
                        ]);
                        $match->setSport($sport->getInternal());

                        var_dump($match);

                        $commentary = $this->crawlData($contentitem->getCOMMENTARY());
                        $statistics = $this->crawlData($contentitem->getGAMEINFO());

                    } catch (SportNotSupportedException $e) {
                        $this->logger->debug($e->getMessage());
                        continue;
                    } catch (APINotLoadableException $e) {
                        $match->setActive(false);
                        $this->logger->debug($e->getMessage());
                        continue;
                    }
                }
            } catch (APINotLoadableException $e) {
            }
        }
    }
}