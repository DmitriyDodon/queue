<?php

namespace App\Jobs;



use App\Models\UserData;
use App\Models\Visit;
use App\Service\Geo\GeoServiceInteface;
use App\Service\UserAgent\UserAgentInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param GeoServiceInteface $geo
     * @param UserAgentInterface $userAgent
     * @return void
     */
    public function handle(GeoServiceInteface $geo , UserAgentInterface $userAgent)
    {

        $userAgent->parse($this->data['user_agent']);
        $geo->parse($this->data['user_ip']);

        $visit['ip'] = $this->data['user_ip'];
        $visit['continent_code'] = $geo->continentCode();
        $visit['country_code'] = $geo->countryCode();
        $visit['user_browser'] = $userAgent->getBrowserName();
        $visit['user_os'] = $userAgent->getOsName();

        Visit::create($visit);

    }
}
