<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdAt = Carbon::now();
        $updatedAt = Carbon::now();
        $cities = [
            [
                'name' => 'Томск',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ],
            [
                'name' => 'Новосибирск',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ],
            [
                'name' => 'Челябинск',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ],
            [
                'name' => 'Москва',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]
        ];

        City::insert($cities);
    }
}
