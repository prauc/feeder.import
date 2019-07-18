<?php


namespace App\Command\Liveticker\sources\sportal\entities\soccer\statistics;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;

class XML_MATCHCENTRE implements SourceEntityInterface
{
    private $MINUTE;
    private $TEAM;

    /**
     * @return mixed
     */
    public function getMINUTE()
    {
        return $this->MINUTE;
    }

    /**
     * @param mixed $MINUTE
     */
    public function setMINUTE($MINUTE): void
    {
        $this->MINUTE = $MINUTE;
    }

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