<?php


namespace App\Command\Liveticker\sources\sportal\entities\overview;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;

class Contentitem implements SourceEntityInterface
{
    private $MATCHID;
    private $DIVISIONID;
    private $DIVISIONNAMESEO;
    private $SPORT;
    private $SPORTID;
    private $HEADLINE;
    private $COMPETITION;
    private $TIME;
    private $STATUS;
    private $COMMENTARY;
    private $GAMEINFO;
    private $TURNIERID;
    private $COMPETITIONID;
    private $DATE;

    /**
     * @return mixed
     */
    public function getMATCHID()
    {
        return $this->MATCHID;
    }

    /**
     * @param mixed $MATCHID
     */
    public function setMATCHID($MATCHID): void
    {
        $this->MATCHID = $MATCHID;
    }

    /**
     * @return mixed
     */
    public function getDIVISIONID()
    {
        return $this->DIVISIONID;
    }

    /**
     * @param mixed $DIVISIONID
     */
    public function setDIVISIONID($DIVISIONID): void
    {
        $this->DIVISIONID = $DIVISIONID;
    }

    /**
     * @return mixed
     */
    public function getDIVISIONNAMESEO()
    {
        return $this->DIVISIONNAMESEO;
    }

    /**
     * @param mixed $DIVISIONNAMESEO
     */
    public function setDIVISIONNAMESEO($DIVISIONNAMESEO): void
    {
        $this->DIVISIONNAMESEO = $DIVISIONNAMESEO;
    }

    /**
     * @return mixed
     */
    public function getSPORT()
    {
        return $this->SPORT;
    }

    /**
     * @param mixed $SPORT
     */
    public function setSPORT($SPORT): void
    {
        $this->SPORT = $SPORT;
    }

    /**
     * @return mixed
     */
    public function getSPORTID()
    {
        return $this->SPORTID;
    }

    /**
     * @param mixed $SPORTID
     */
    public function setSPORTID($SPORTID): void
    {
        $this->SPORTID = $SPORTID;
    }

    /**
     * @return mixed
     */
    public function getHEADLINE()
    {
        return $this->HEADLINE;
    }

    /**
     * @param mixed $HEADLINE
     */
    public function setHEADLINE($HEADLINE): void
    {
        $this->HEADLINE = $HEADLINE;
    }

    /**
     * @return mixed
     */
    public function getCOMPETITION()
    {
        return $this->COMPETITION;
    }

    /**
     * @param mixed $COMPETITION
     */
    public function setCOMPETITION($COMPETITION): void
    {
        $this->COMPETITION = $COMPETITION;
    }

    /**
     * @return mixed
     */
    public function getTIME()
    {
        return $this->TIME;
    }

    /**
     * @param mixed $TIME
     */
    public function setTIME($TIME): void
    {
        $this->TIME = $TIME;
    }

    /**
     * @return mixed
     */
    public function getSTATUS()
    {
        return $this->STATUS;
    }

    /**
     * @param mixed $STATUS
     */
    public function setSTATUS($STATUS): void
    {
        $this->STATUS = $STATUS;
    }

    /**
     * @return mixed
     */
    public function getCOMMENTARY()
    {
        return $this->COMMENTARY;
    }

    /**
     * @param mixed $COMMENTARY
     */
    public function setCOMMENTARY($COMMENTARY): void
    {
        $this->COMMENTARY = $COMMENTARY;
    }

    /**
     * @return mixed
     */
    public function getGAMEINFO()
    {
        return $this->GAMEINFO;
    }

    /**
     * @param mixed $GAMEINFO
     */
    public function setGAMEINFO($GAMEINFO): void
    {
        $this->GAMEINFO = $GAMEINFO;
    }

    /**
     * @return mixed
     */
    public function getTURNIERID()
    {
        return $this->TURNIERID;
    }

    /**
     * @param mixed $TURNIERID
     */
    public function setTURNIERID($TURNIERID): void
    {
        $this->TURNIERID = $TURNIERID;
    }

    /**
     * @return mixed
     */
    public function getCOMPETITIONID()
    {
        return $this->COMPETITIONID;
    }

    /**
     * @param mixed $COMPETITIONID
     */
    public function setCOMPETITIONID($COMPETITIONID): void
    {
        $this->COMPETITIONID = $COMPETITIONID;
    }

    /**
     * @return mixed
     */
    public function getDATE()
    {
        return $this->DATE;
    }

    /**
     * @param mixed $DATE
     */
    public function setDATE($DATE): void
    {
        $this->DATE = $DATE;
    }
}