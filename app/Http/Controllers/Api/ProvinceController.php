<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProvinceService;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function search(Request $request, ProvinceService $provinceService)
    {
        $request->validate([
            'id' => 'nullable|numeric'
        ]);
        $response = $provinceService->search($request->id);

        return response()->json([
            'message' => $response['message'],
            'results' => $response['results'] ?? null
        ],$response['code']);
    }
}
