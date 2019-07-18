<?php


namespace App\Command\Liveticker\sources\sportal\entities\soccer\statistics;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;

class XML_FOOTBALL implements SourceEntityInterface
{
    private $MATCHCENTRE;

    /**
     * @return mixed
     */
    public function getMATCHCENTRE()
    {
        return $this->MATCHCENTRE;
    }

    /**
     * @param mixed $MATCHCENTRE
     */
    public function setMATCHCENTRE($MATCHCENTRE): void
    {
        $this->MATCHCENTRE = $MATCHCENTRE;
    }
}