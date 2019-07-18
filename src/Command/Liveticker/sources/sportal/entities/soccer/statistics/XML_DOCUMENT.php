<?php


namespace App\Command\Liveticker\sources\sportal\entities\soccer\statistics;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;

class XML_DOCUMENT implements SourceEntityInterface
{
    private $TITLE;
    private $DESCRPTION;
    private $IDENTIFIER;

    /**
     * @return mixed
     */
    public function getTITLE()
    {
        return $this->TITLE;
    }

    /**
     * @param mixed $TITLE
     */
    public function setTITLE($TITLE): void
    {
        $this->TITLE = $TITLE;
    }

    /**
     * @return mixed
     */
    public function getDESCRPTION()
    {
        return $this->DESCRPTION;
    }

    /**
     * @param mixed $DESCRPTION
     */
    public function setDESCRPTION($DESCRPTION): void
    {
        $this->DESCRPTION = $DESCRPTION;
    }

    /**
     * @return mixed
     */
    public function getIDENTIFIER()
    {
        return $this->IDENTIFIER;
    }

    /**
     * @param mixed $IDENTIFIER
     */
    public function setIDENTIFIER($IDENTIFIER): void
    {
        $this->IDENTIFIER = $IDENTIFIER;
    }
}