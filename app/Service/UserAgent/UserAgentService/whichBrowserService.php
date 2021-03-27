<?php

namespace App\Service\UserAgent\UserAgentService;

use App\Service\UserAgent\UserAgentInterface;
use WhichBrowser\Parser;

class whichBrowserService implements UserAgentInterface
{
    protected $data;

    public function parse($user_agent)
    {
        $this->data = new Parser($user_agent);
    }

    public function getBrowserName()
    {
        return $this->data->browser->toString();
    }

    public function getOsName()
    {
        return $this->data->os->toString();
    }

}
