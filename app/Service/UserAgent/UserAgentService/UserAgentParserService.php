<?php


namespace App\Service\UserAgent\UserAgentService;


use UAParser\Parser;

class UserAgentParserService implements \App\Service\UserAgent\UserAgentInterface
{
    protected $data;

    public function parse($user_agent)
    {
        $this->data = Parser::create()->parse($user_agent);
    }

    public function getBrowserName()
    {
        return $this->data->ua->toString();
    }

    public function getOsName()
    {
        return $this->data->os->toString();
    }
}
