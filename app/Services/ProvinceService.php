<?php

namespace App\Services;

use App\Models\Province;

class ProvinceService
{
    public function search($id = null)
    {
        if($id == null){
            $data = Province::all();
        }else {
            $data = Province::ofId($id)->first() ?? [];
        }

        return [
            'message' => 'OK',
            'results' => $data,
            'code' => 200
        ];
    }
}