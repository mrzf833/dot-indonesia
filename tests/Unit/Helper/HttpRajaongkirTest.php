<?php

namespace Tests\Unit\Helper;

use App\Helpers\HttpRajaongkir;
use Tests\TestCase;
use Tests\CreatesApplication;

class HttpRajaongkirTest extends TestCase
{
    use CreatesApplication;

    /**
     * A basic unit test example.
     */
    public function test_exec_rajaongkir_success(): void
    {
        $response = HttpRajaongkir::exec()->get('/starter/province', [
            'id' => 1
        ]);

        $status = $response->getStatusCode();
        $this->assertEquals('200', $status);
    }

    public function test_exec_rajaongkir_error_400(): void
    {
        $response = HttpRajaongkir::exec()
            ->withHeaders([
                'key' => ''
            ])
            ->get('/starter/province', [
                'id' => 1
            ]);

        $status = $response->getStatusCode();
        $this->assertEquals('400', $status);
    }
}
