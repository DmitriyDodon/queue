<?php


namespace App\Service\UserAgent;


interface UserAgentInterface
{
    public function parse($user_agent);
    public function getBrowserName();
    public function getOsName();
}
