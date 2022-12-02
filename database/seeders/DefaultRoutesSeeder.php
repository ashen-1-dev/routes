<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DefaultRoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all()->take(10);
        foreach ($cities as $i => $city) {
            $city->routes()->create(['name' => 'My Route ' . $i]);
        }
    }
}
