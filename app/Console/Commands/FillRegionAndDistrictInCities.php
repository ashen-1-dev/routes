<?php

namespace App\Console\Commands;

use App\Services\CityService;
use Illuminate\Console\Command;

class FillRegionAndDistrictInCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fills region and district in existing cities';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CityService $cityService)
    {
        try {
            $cityService->fillRegionAndDistrictInCities();
            $this->info('Success!');
        } catch (\Throwable $exception) {
            $this->error('Something went wrong...');
        }
    }
}
