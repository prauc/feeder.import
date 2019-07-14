<?php


namespace App\Command\Liveticker;



class DailyLivetickerCommand extends AbstractLivetickerCommand
{
    protected function getModus(): string
    {
        return AbstractLivetickerCommand::MODUS_DAILY;
    }
}