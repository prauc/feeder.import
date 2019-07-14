<?php


namespace App\Command\Liveticker;



class CircularLivetickerCommand extends AbstractLivetickerCommand
{
    protected function getModus(): string
    {
        return AbstractLivetickerCommand::MODUS_CIRCULAR;
    }
}