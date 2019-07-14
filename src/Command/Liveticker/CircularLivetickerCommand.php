<?php


namespace App\Command\Liveticker;



class CircularLivetickerCommand extends AbstractLivetickerCommand
{
    protected static $defaultName = 'daemon:liveticker:circular';

    protected function getModus(): string
    {
        return AbstractLivetickerCommand::MODUS_CIRCULAR;
    }
}