<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PerdaBerandaController extends Controller
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // $token = session('token');
            // $data = $this->getAllData($this->baseUrl, $token);
            // return view('admin.perda.beranda.index', ['data' => $data]);
            return view('admin.perda.beranda.index');
        } catch (\Exception $e) {
            Log::error("Error fetching data: " . $e->getMessage());
            return response()->json(['error' => 'Data fetching error'], 500);
        }
    }

    private function fetchData($baseUrl, $token, $page = 1, $length = 10, $opd = '', $nip = '', $nama = '')
    {
        $response = Http::withHeaders([
            'User-Agent' => 'insomnia/2023.5.8',
            'Authorization' => 'Bearer ' . $token
        ])->get("{$baseUrl}/esakip/list_pengampu", [
            'type' => 'pagination',
            'page' => $page,
            'length' => $length,
            'opd' => $opd,
            'nip' => $nip,
            'nama' => $nama
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function getAllData($baseUrl, $token)
    {
        $page = 1;
        $allData = [];
        $length = 1000;

        do {
            $data = $this->fetchData($baseUrl, $token, $page, $length, '', '', 'a');

            if (!empty($data)) {
                $allData = array_merge($allData, $data);
                $page++;
            }
        } while (!empty($data) && count($data) == $length);

        return $allData;
    }
}
