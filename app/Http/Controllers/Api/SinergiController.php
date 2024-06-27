<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Models\PerdaPengukuran;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Models\PerdaPengukuranTahunan;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Pagination\LengthAwarePaginator;


class SinergiController extends BaseController
{
    private $baseUrl;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
        $this->clientId = '3c15eda4-f16a-444a-9807-f03ac2d73ea6';
        $this->clientSecret = 'a36KxQjb6KQO89o6zgb2ld9fC9LwPZ3Tir5chWGC';
    }

    public function getPengampuNip($nip)
    {
        $response1 = Http::withHeaders([
            'Content-Type' => 'application/json',
            'User-Agent' => 'insomnia/2023.5.8'
        ])->post("{$this->baseUrl}/auth", [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ]);
        $token = json_decode($response1->getBody()->getContents());
        $response2 = Http::withHeaders([
            'User-Agent' => 'insomnia/2023.5.8',
            'Authorization' => 'Bearer ' . $token->result->token
        ])->get('https://sammara.majalengkakab.go.id/public_api/esakip/list_pengampu/' . $nip);
        $detail = json_decode($response2->getBody()->getContents());
        $result = $detail->result ?? '';
        return $result;
    }

    public function getPengampu()
    {
        $response1 = Http::withHeaders([
            'Content-Type' => 'application/json',
            'User-Agent' => 'insomnia/2023.5.8'
        ])->post("{$this->baseUrl}/auth", [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ]);
        $token = json_decode($response1->getBody()->getContents());
        $response2 = Http::withHeaders([
            'User-Agent' => 'insomnia/2023.5.8',
            'Authorization' => 'Bearer ' . $token->result->token
        ])->get('https://sammara.majalengkakab.go.id/public_api/esakip/list_pengampu/');
        $detail = json_decode($response2->getBody()->getContents());
        $result = $detail->result ?? '';
        return $result;
    }

    public function getPerjanjianKinerja(Request $request): JsonResponse
    {
        
    }

    public function getPerjanjianKinerjaNip(Request $request, $nip): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $query = PerdaSastraIn::with(['user', 'perda_sastra', 'satuan', 'penanggung_jawabs'])
            ->whereHas('perda_sastra', function ($query) use ($nip) {
                $query->where('pengampu_id', $nip);
            });
        $paginatedData = $query->paginate($perPage);
        $data_nip = $this->getPengampuNip($nip);
        $formattedData = $paginatedData->map(function ($item) use ($data_nip) {
            return [
                'id' => $item->id,
                'nip' => $data_nip->nip,
                'nama' => $data_nip->nama_pegawai,
                'sasaran_strategis' => $item->perda_sastra->sasaran,
                'indikator' => $item->indikator,
                'target' => $item->target1,
                'periode' => $item->perda_sastra->tahun,
                'sasaran_atasan' => '',
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

    public function getCapaianIku(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $tahun = $request->get('tahun');
        $user = $request->get('user');
        $query = PerdaPengukuranTahunan::with(['user', 'perda_pengukuran'])
            ->whereHas('user', function ($query) use ($user) {
                $query->where('role', 'perda');
                if (!empty($user)) {
                    $query->where('user_id', $user);
                }
            })->whereHas('perda_pengukuran', function ($query) use ($tahun) {
                if (!empty($tahun)) {
                    $query->where('tahun', $tahun);
                }
            });
        $paginatedData = $query->paginate($perPage);
        $formattedData = $paginatedData->map(function ($item) {
            return [
                'id' => $item->id,
                'opd' => $item->user->name,
                'capaian_tahunan' => $item->tahunan_capaian,
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

    public function getCapaianIkuOpd(Request $request, $opd): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $query = PerdaPengukuranTahunan::with(['user', 'perda_pengukuran'])
            ->whereHas('user', function ($query) use ($opd) {
                $query->where('name', $opd);
            });
        $paginatedData = $query->paginate($perPage);
        $formattedData = $paginatedData->map(function ($item) {
            return [
                'id' => $item->id,
                'opd' => $item->user->name,
                'capaian_tahunan' => $item->tahunan_capaian,
            ];
        });
        return response()->json([
            'success' => true,
            'data' => $formattedData->values(),
            'pagination' => [
                'current_page' => $paginatedData->currentPage(),
                'last_page' => $paginatedData->lastPage(),
                'per_page' => $paginatedData->perPage(),
                'total' => $paginatedData->total(),
            ],
            'message' => 'Data retrieved successfully.'
        ]);
    }

}
