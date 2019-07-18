<?php


namespace App\Command\Liveticker;



class DailyLivetickerCommand extends AbstractLivetickerCommand
{
    protected static $defaultName = "daemon:liveticker:daily";

    protected function getModus(): string
    {
        return AbstractLivetickerCommand::MODUS_DAILY;
    }
}