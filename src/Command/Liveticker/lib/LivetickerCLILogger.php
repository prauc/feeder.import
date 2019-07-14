<?php


namespace App\Command\Liveticker\lib;


use Monolog\Logger;

class LivetickerCLILogger extends Logger
{
    private $source;
    private $modus;

    function __construct(array $handlers = array(), array $processors = array())
    {
        parent::__construct("liveticker", $handlers, $processors);
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function setModus($modus) {
        $this->modus = $modus;
    }

    private function getContext(): array {
        return [
            "source" => $this->source,
            "modus" => $this->modus
        ];
    }

    public function debug($message, array $context = array())
    {
        return parent::debug($message, $this->getContext());
    }

    public function error($message, array $context = array())
    {
        return parent::error($message, $this->getContext());
    }
}