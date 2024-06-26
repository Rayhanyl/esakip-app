<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CapaianIkuResource;
use App\Http\Resources\CapaianIkuOpdResource;
use App\Http\Resources\PerjanjianNipResource;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\PerjanjianKinerjaResource;
use App\Http\Controllers\Api\BaseController as BaseController;


class SinergiController extends BaseController
{
    public function getPerjanjianKinerja(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
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
        $paginatedData = $query->paginate($perPage);
        $formattedData = $paginatedData->map(function ($item) {
            return [
                'id' => $item->id,
                'perangkat_daerah' => $item->user->name,
                'sasaran_strategis' => $item->perda_sastra->sasaran,
                'indikator' => $item->indikator,
                'target' => $item->target1,
            ];
        });
        return response()->json([
            'success' => true,
            'data' => $formattedData,
            'pagination' => [
                'current_page' => $paginatedData->currentPage(),
                'last_page' => $paginatedData->lastPage(),
                'per_page' => $paginatedData->perPage(),
                'total' => $paginatedData->total(),
            ],
            'message' => 'Data retrieved successfully.'
        ]);
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
