<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function search(Request $request, CityService $cityService)
    {
        $request->validate([
            'id' => 'nullable|numeric'
        ]);
        $response = $cityService->search($request->id);

        return response()->json([
            'message' => $response['message'],
            'results' => $response['results'] ?? null
        ],$response['code']);
    }
}
