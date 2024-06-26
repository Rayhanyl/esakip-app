<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CapaianIkuResource;
use App\Http\Resources\CapaianIkuOpdResource;
use App\Http\Resources\PerjanjianNipResource;
use App\Http\Resources\PerjanjianKinerjaResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Pagination\LengthAwarePaginator;


class SinergiController extends BaseController
{
    public function getPerjanjianKinerja(Request $request): JsonResponse
    {
        $query = PerdaSastraIn::with(['user', 'perda_sastra', 'satuan', 'penanggung_jawabs'])
            ->whereHas('user', function ($query) use ($request) {
                $query->where('role', 'perda');
                if ($request->has('perda')) {
                    $query->where('user_id', $request->perda);
                }
            })
            ->whereHas('perda_sastra', function ($query) use ($request) {
                if ($request->has('tahun')) {
                    $query->where('tahun', $request->tahun);
                }
            });

        $data = $query->get();

        return $this->sendResponse(PerjanjianKinerjaResource::collection($data), 'Data retrieved successfully.');
    }

    public function getPerjanjianKinerjaNip(Request $request): JsonResponse
    {
        // 
        return $this->sendResponse(PerjanjianNipResource::collection($products), 'Data retrieved successfully.');
    }

    public function getCapaianIku(Request $request): JsonResponse
    {
        // 
        return $this->sendResponse(CapaianIkuResource::collection($products), 'Data retrieved successfully.');
    }

    public function getCapaianIkuOpd(Request $request): JsonResponse
    {
        // 
        return $this->sendResponse(CapaianIkuOpdResource::collection($data), 'Data retrieved successfully.');
    }
}
