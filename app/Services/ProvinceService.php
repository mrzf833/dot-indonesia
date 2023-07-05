<?php

namespace App\Services;

use App\Helpers\HttpRajaongkir;
use App\Models\Province;

class ProvinceService
{
    public function searchDb($id = null)
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

    public function searchRajaongkir($id = null)
    {
        $response = HttpRajaongkir::exec()->get("starter/province", [
            'id' => $id
        ]);

        $status = strval($response->status())[0];

        if($status != "2"){
            return [
                'message' => $response->json()['rajaongkir']['status']['description'],
                'code' => $response->json()['rajaongkir']['status']['code'],
            ];
        }

        return [
            'message' => $response->json()['rajaongkir']['status']['description'],
            'results' => $response->json()['rajaongkir']['results'],
            'code' => $response->json()['rajaongkir']['status']['code'],
        ];
    }

    public function search($id = null)
    {
        if(config('rajaongkir')['swap_rajaongkir_or_db'] == "rajaongkir"){
            $response = $this->searchRajaongkir($id);
        }else {
            $response = $this->searchDb($id);
        }

        return $response;
    }
}