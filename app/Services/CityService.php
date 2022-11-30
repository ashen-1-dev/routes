<?php

namespace App\Services;

use App\Models\City;
use App\Models\District;
use App\Models\Region;

class CityService
{
    private readonly DadataService $dadataService;

    public function __construct(DadataService $dadataService)
    {
        $this->dadataService = $dadataService;
    }

    public function fillRegionAndDistrictInCities()
    {
        $cities = City::all();
        $dadataCities = $this->dadataService
            ->getStandardAddresses($cities
                ->map(fn (City $city) => $city->name)
                ->toArray());

        foreach ($cities as $city) {
            $dadataCity = $dadataCities->where('source','=', $city->name)->first();

            if(!isset($city->region)) {
                $region = Region::firstOrCreate(
                    ['name' => $dadataCity->regionWithType],
                    ['district_id' => District::firstOrCreate(['name' => $dadataCity->federalDistrict])->id]
                );
                $city->region_id = $region->id;
                $city->save();
            }
        }
    }

}
