<?php

namespace App\Http\Controllers\Admin;

use Closure;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs;

    public function __construct()
    {
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
}
