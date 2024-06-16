<?php

namespace App\Http\Controllers\Admin;

use Closure;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs;
    public $baseUrl;
    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
        $this->middleware(function (Request $request, Closure $next) {
            View::share('tipe_perhitungan_options', collect(array_combine(
                ["1", "2"],
                ["Kumulatif", "Non-Kumulatif"],
            ))->transform(function ($list) {
                return $list;
            }));
            View::share('satuan_options', Satuan::all()->keyBy('id')->transform(function ($list) {
                return $list->satuan;
            }));
            View::share('tahun_options', collect(array_combine(range(2029, 2020, -1), range(2029, 2020, -1)))->transform(function ($list) {
                return $list;
            }));
            return $next($request);
        });
    }
    public function get_pengampu(Request $request)
    {
        $nip = '';
        $nama = '';
        if (is_numeric($request->q)) {
            $nip = $request->q;
        } else {
            $nama = $request->q;
        }
        // Set the page number and number of items per page
        $page = $request->input('page', 1);
        $perPage = 12202; // You can adjust this value as needed

        $response = Http::withHeaders([
            'User-Agent' => 'insomnia/2023.5.8',
            'Authorization' => 'Bearer ' . session('token')
        ])->get($this->baseUrl . '/esakip/list_pengampu?opd=&nip=' . $nip . '&nama=' . $nama);
        // Check if the request was successful
        if ($response->successful()) {
            $data = json_decode($response->getBody()->getContents());
            // Paginate the data
            $paginatedData = Paginator::resolveCurrentPage('page') ?: 1;
            $paginatedData = new LengthAwarePaginator(
                collect($data->result)->forPage($page, $perPage),
                count($data->result),
                $perPage,
                $page,
                ['path' => Paginator::resolveCurrentPath()]
            );
            return response()->json($paginatedData);
        } else {
            // Handle error response
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
}
