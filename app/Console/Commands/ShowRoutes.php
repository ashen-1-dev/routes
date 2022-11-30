<?php

namespace App\Console\Commands;

use App\Models\Route;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class ShowRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routes:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show existing routes';


    public function handle(): void
    {
        $routes = $this->getRoutes();
        $rows = [];
        foreach ($routes as $i => $item) {
            $rows[$i]['name'] = $item->name;
            $rows[$i]['routeableName'] = $item->routeable->name;
        }
        $this->table(
            ['Название маршрута', 'Тип направления'],
            $rows
        );
    }

    private function getRoutes(): Collection {
        $districtId = (int) $this->ask('Type district id or ENTER to skip');
        $regionId = (int) $this->ask('Type region id or ENTER to skip');

        $routes = [];

        if(!$districtId && !$regionId) {
            $routes = Route::with(['routeable'])->get();
        } else {
            $routes = Route::with(['routeable'])
                ->where('routeable_id', '=', $districtId | $regionId)
                ->get();
        }
        return $routes;
    }

}
