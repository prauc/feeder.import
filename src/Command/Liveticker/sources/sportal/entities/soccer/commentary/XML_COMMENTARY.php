<?php


namespace App\Command\Liveticker\sources\sportal\entities\soccer\commentary;


use App\Command\Liveticker\sources\sportal\entities\SourceEntityInterface;

class XML_COMMENTARY implements SourceEntityInterface
{
    private $COMMENT;

    /**
     * @return mixed
     */
    public function getCOMMENT()
    {
        return $this->COMMENT;
    }

    /**
     * @param mixed $COMMENT
     */
    public function setCOMMENT($COMMENT): void
    {
        $this->COMMENT = $COMMENT;
    }
}