<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PerdaBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
    }

    public function __invoke()
    {
        // $response = Http::withHeaders([
        //     'User-Agent' => 'insomnia/2023.5.8',
        //     'Authorization' => 'Bearer ' . session('token')
        // ])->get($this->baseUrl . '/esakip/list_pengampu?type=pagination&page=1&length=10');
        // $data = json_decode($response->getBody()->getContents());
        // dd($data);
        return view('admin.perda.beranda.index');
    }
}
