<?php

namespace App\Console\Commands;

use App\Helpers\HttpRajaongkir;
use App\Models\City;
use App\Models\Province;
use Illuminate\Console\Command;

class GetAndStoreRajaongkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rajaongkir:exec';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get and store data city and province from rajaongkir to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $statusProvince = $this->province();

        if($statusProvince['status'] == "failed"){
            $this->error($statusProvince['message']);
        }else{
            $this->info($statusProvince['message']);
        }

        $statusCity = $this->city();

        if($statusCity['status'] == "failed"){
            $this->error($statusCity['message']);
        }else{
            $this->info($statusCity['message']);
        }
    }

    public function city()
    {
        $response = HttpRajaongkir::exec()->get("starter/city");

        $status = strval($response->status())[0];

        if($status != "2"){
            return [
                "message" => $response->json()['rajaongkir']['status']['description'],
                "status" => "failed"
            ];
        }

        foreach($response->json()['rajaongkir']['results'] as $city){
            City::updateOrCreate([
                'city_id' => $city['city_id']
            ],[
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code'],
            ]);
        }

        return [
            'message' => 'berhasil di get and store data city',
            'status' => 'success'
        ];
    }

    public function province()
    {
        $response = HttpRajaongkir::exec()->get("starter/province");

        $status = strval($response->status())[0];

        if($status != "2"){
            return [
                "message" => $response->json()['rajaongkir']['status']['description'],
                "status" => "failed"
            ];
        }

        foreach($response->json()['rajaongkir']['results'] as $province){
            Province::updateOrCreate([
                'province_id' => $province['province_id']
            ],[
                'province' => $province['province']
            ]);
        }

        return [
            'message' => 'berhasil di get and store data province',
            'status' => 'success'
        ];
    }
}
