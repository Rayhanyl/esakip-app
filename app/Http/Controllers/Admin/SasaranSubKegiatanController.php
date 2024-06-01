<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranKegiatan;
use App\Models\SasaranSubKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranSubKegiatanIndikator;
use App\Http\Requests\StoreSasaranSubKegiatanRequest;
use App\Http\Requests\UpdateSasaranSubKegiatanRequest;

class SasaranSubKegiatanController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('sasaran_kegiatan_options', SasaranKegiatan::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran_kegiatan;
        }));
        View::share('sasaran_sub_kegiatan', SasaranSubKegiatan::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perda.perencanaan_kinerja.sasaran_sub_kegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data =  SasaranSubKegiatan::create(array_merge($request->except('indikator_sasaran'), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator_sasaran as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_sub_kegiatan_id' => $data->id]);
            SasaranSubKegiatanIndikator::create($params);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranSubKegiatan $sasaranSubKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranSubKegiatan $sasaranSubKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranSubKegiatanRequest $request, SasaranSubKegiatan $sasaranSubKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranSubKegiatan $sasaranSubKegiatan)
    {
        //
    }
    
    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.perda.perencanaan_kinerja.sasaran_sub_kegiatan._partials.indicator', compact('iter'));
    }
}
