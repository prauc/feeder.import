<?php


namespace App\Command\Liveticker\lib;


use Monolog\Logger;

class LivetickerCLILogger extends Logger
{
    private $source;

    function __construct(array $handlers = array(), array $processors = array())
    {
        parent::__construct("liveticker", $handlers, $processors);
    }

    public function setSource($source) {
        $this->source = $source;
    }

    private function getContext(): array {
        return [
            "source" => $this->source,
        ];
    }

    public function info($message, array $context = array())
    {
        return parent::info($message, array_merge($context, $this->getContext()));
    }

    public function debug($message, array $context = array())
    {
        return parent::debug($message, array_merge($context, $this->getContext()));
    }

    public function error($message, array $context = array())
    {
        return parent::error($message, array_merge($context, $this->getContext()));
    }
}