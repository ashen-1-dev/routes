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
        City::first()->routes()->create([
            'name' => 'My Route 1'
        ]);
        Region::first()->routes()->create([
            'name' => 'My Route 2'
        ]);
        District::first()->routes()->create([
            'name' => 'My Route 3'
        ]);
    }
}
