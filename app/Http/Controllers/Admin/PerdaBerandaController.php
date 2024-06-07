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
        return view('admin.perda.beranda.index');
    }
}
