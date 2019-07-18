<?php


namespace App\Command\Liveticker\sources\sportal\entities\soccer\statistics;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;

class XML_TEAM implements SourceEntityInterface
{
    private $TEAM;

    /**
     * @return mixed
     */
    public function getTEAM()
    {
        return $this->TEAM;
    }

    /**
     * @param mixed $TEAM
     */
    public function setTEAM($TEAM): void
    {
        $this->TEAM = $TEAM;
    }


}