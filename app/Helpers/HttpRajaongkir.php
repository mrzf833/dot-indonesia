<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HttpRajaongkir {
    public static function exec()
    {
        return Http::withHeaders([
            'key' => config('rajaongkir')['key']
        ])->baseUrl(config('rajaongkir')['base_url']);
    }
}