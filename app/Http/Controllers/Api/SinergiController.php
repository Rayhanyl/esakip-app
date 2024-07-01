<?php

namespace App\Http\Controllers\Api;

use App\Models\PerdaSastra;
use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Models\PerdaPengukuran;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Models\PerdaPengukuranTahunan;
use App\Http\Controllers\Api\BaseController;
use App\Models\PemkabSastra;
use App\Models\PerdaKegia;
use App\Models\PerdaProg;
use App\Models\PerdaSubKegia;
use App\Models\PerdaSubKegiaPengampu;
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

    public function getPengampu($nip)
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
        $nama_pegawai = $result->nama_pegawai ?? '';
        if ($nama_pegawai == '') {
            $nama_pegawai = 'Bupati Majalengka';
        }
        return $nama_pegawai;
    }

    public function getPerjanjianKinerja(Request $request): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 10);

            // Initialize an empty array to store results
            $result = [];

            // Fetch data for Pemkab Sastra
            $pemkab = PemkabSastra::with('user', 'pemkab_sastra_ins')->get();
            foreach ($pemkab as $value) {
                $pemkab_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id), // Assuming getPengampu returns an array with 'nip' and 'nama_pegawai'
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => '',
                ];

                foreach ($value->pemkab_sastra_ins as $value_ins) {
                    $pemkab_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $pemkab_list;
            }

            // Fetch data for Perda Sastra
            $perda_sastra = PerdaSastra::with(['user', 'perda_sastra_ins', 'pemkab_sastra'])->get();
            foreach ($perda_sastra as $value) {
                $perda_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id), // Assuming getPengampu returns an array with 'nip' and 'nama_pegawai'
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => $value->pemkab_sastra->sasaran,
                ];

                foreach ($value->perda_sastra_ins as $value_ins) {
                    $perda_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $perda_list;
            }

            // Fetch data for Perda Prog
            $perda_prog = PerdaProg::with(['user', 'perda_prog_ins', 'perda_sastra'])->get();
            foreach ($perda_prog as $value) {
                $perda_prog_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id), // Assuming getPengampu returns an array with 'nip' and 'nama_pegawai'
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => $value->perda_sastra->sasaran,
                ];

                foreach ($value->perda_prog_ins as $value_ins) {
                    $perda_prog_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $perda_prog_list;
            }

            // Fetch data for Perda Kegia
            $perda_kegia = PerdaKegia::with(['user', 'perda_kegia_ins', 'perda_prog'])->get();
            foreach ($perda_kegia as $value) {
                $perda_kegia_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id), // Assuming getPengampu returns an array with 'nip' and 'nama_pegawai'
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => $value->perda_prog->sasaran,
                ];

                foreach ($value->perda_kegia_ins as $value_ins) {
                    $perda_kegia_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $perda_kegia_list;
            }

            // Fetch data for Perda SubKegia
            $perda_subkegia = PerdaSubKegia::with(['user', 'perda_subkegia_ins', 'perda_kegia', 'perda_subkegia_pengampus'])->get();
            foreach ($perda_subkegia as $value) {
                foreach ($value->perda_subkegia_pengampus as $pengampu) {
                    $perda_subkegia_list = [
                        'nip' => $value->pengampu_id,
                        'nama' => $this->getPengampu($value->pengampu_id), // Assuming getPengampu returns an array with 'nip' and 'nama_pegawai'
                        'sasaran' => $value->sasaran,
                        'periode' => $value->tahun,
                        'pengampu' => $pengampu->pengampu_id,
                        'data_indikator' => [],
                        'sasaran_atasan' => $value->perda_kegia->sasaran,
                    ];

                    foreach ($value->perda_subkegia_ins as $value_ins) {
                        $perda_subkegia_list['data_indikator'][] = [
                            'indikator' => $value_ins->indikator,
                            'target' => $value_ins->target,
                        ];
                    }

                    $result[] = $perda_subkegia_list;
                }
            }

            // Convert $result array to a paginator instance
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $col = collect($result);
            $perPage = 10; // Number of items per page
            $currentPageItems = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $paginator = new LengthAwarePaginator($currentPageItems, count($col), $perPage);

            return response()->json([
                'success' => true,
                'data' => $paginator,
                'message' => 'Data retrieved successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getPerjanjianKinerjaNip(Request $request, $nip): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 10);

            // Validate the NIP parameter
            if (empty($nip)) {
                return response()->json([
                    'success' => false,
                    'message' => 'NIP is required.'
                ], 400);
            }

            // Initialize an empty array to store results
            $result = [];

            // Fetch data for Pemkab Sastra
            $pemkab = PemkabSastra::with('pemkab_sastra_ins')
                ->where('pengampu_id', $nip)
                ->get();
            foreach ($pemkab as $value) {
                $pemkab_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id)['nama_pegawai'] ?? '',
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => '',
                ];

                foreach ($value->pemkab_sastra_ins as $value_ins) {
                    $pemkab_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $pemkab_list;
            }

            // Fetch data for Perda Sastra
            $perda_sastra = PerdaSastra::with(['perda_sastra_ins', 'pemkab_sastra'])
                ->where('pengampu_id', $nip)
                ->get();
            foreach ($perda_sastra as $value) {
                $perda_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id)['nama_pegawai'] ?? '',
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => $value->pemkab_sastra->sasaran ?? '',
                ];

                foreach ($value->perda_sastra_ins as $value_ins) {
                    $perda_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $perda_list;
            }

            // Fetch data for Perda Prog
            $perda_prog = PerdaProg::with(['perda_prog_ins', 'perda_sastra'])
                ->where('pengampu_id', $nip)
                ->get();
            foreach ($perda_prog as $value) {
                $perda_prog_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id)['nama_pegawai'] ?? '',
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => $value->perda_sastra->sasaran ?? '',
                ];

                foreach ($value->perda_prog_ins as $value_ins) {
                    $perda_prog_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $perda_prog_list;
            }

            // Fetch data for Perda Kegia
            $perda_kegia = PerdaKegia::with(['perda_kegia_ins', 'perda_prog'])
                ->where('pengampu_id', $nip)
                ->get();
            foreach ($perda_kegia as $value) {
                $perda_kegia_list = [
                    'nip' => $value->pengampu_id,
                    'nama' => $this->getPengampu($value->pengampu_id)['nama_pegawai'] ?? '',
                    'sasaran' => $value->sasaran,
                    'periode' => $value->tahun,
                    'data_indikator' => [],
                    'sasaran_atasan' => $value->perda_prog->sasaran ?? '',
                ];

                foreach ($value->perda_kegia_ins as $value_ins) {
                    $perda_kegia_list['data_indikator'][] = [
                        'indikator' => $value_ins->indikator,
                        'target' => $value_ins->target1,
                    ];
                }

                $result[] = $perda_kegia_list;
            }

            // Fetch data for Perda SubKegia
            $perda_subkegia = PerdaSubKegia::with(['perda_subkegia_ins', 'perda_kegia', 'perda_subkegia_pengampus'])
                ->whereHas(
                    'perda_subkegia_pengampus',
                    function ($query) use ($nip) {
                        $query->where('pengampu_id', $nip);
                    }
                )->get();
            foreach ($perda_subkegia as $value) {
                foreach ($value->perda_subkegia_pengampus as $pengampu) {
                    $perda_subkegia_list = [
                        'nip' => $value->pengampu_id,
                        'nama' => $this->getPengampu($value->pengampu_id)['nama_pegawai'] ?? '',
                        'sasaran' => $value->sasaran,
                        'periode' => $value->tahun,
                        'pengampu' => $pengampu->pengampu_id,
                        'data_indikator' => [],
                        'sasaran_atasan' => $value->perda_kegia->sasaran ?? '',
                    ];

                    foreach ($value->perda_subkegia_ins as $value_ins) {
                        $perda_subkegia_list['data_indikator'][] = [
                            'indikator' => $value_ins->indikator,
                            'target' => $value_ins->target,
                        ];
                    }

                    $result[] = $perda_subkegia_list;
                }
            }

            // Convert $result array to a paginator instance
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $col = collect($result);
            $currentPageItems = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $paginator = new LengthAwarePaginator($currentPageItems, count($col), $perPage);

            return response()->json([
                'success' => true,
                'data' => $paginator,
                'message' => 'Data retrieved successfully.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
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
