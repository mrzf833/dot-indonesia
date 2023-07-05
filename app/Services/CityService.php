<?php

namespace App\Services;

use App\Models\City;

class CityService
{
    public function search($id = null)
    {
        if($id == null){
            $data = City::join('provinces', 'cities.province_id', '=', 'provinces.province_id')
                ->select('*')->get();
        }else {
            $data = City::ofId($id)
                ->join('provinces', 'cities.province_id', '=', 'provinces.province_id')
                ->select('*')->first();
        }

        return [
            'message' => 'OK',
            'results' => $data,
            'code' => 200
        ];
    }
}