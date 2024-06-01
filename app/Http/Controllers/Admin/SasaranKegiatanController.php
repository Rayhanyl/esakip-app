<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranProgram;
use App\Models\SasaranKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranKegiatanIndikator;
use App\Http\Requests\StoreSasaranKegiatanRequest;
use App\Http\Requests\UpdateSasaranKegiatanRequest;

class SasaranKegiatanController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('sasaran_program_options', SasaranProgram::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran_program;
        }));
        View::share('sasaran_kegiatan', SasaranKegiatan::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perda.perencanaan_kinerja.sasaran_kegiatan.index');
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
        $data =  SasaranKegiatan::create(array_merge($request->except('indikator_sasaran'), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator_sasaran as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_kegiatan_id' => $data->id]);
            SasaranKegiatanIndikator::create($params);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranKegiatan $sasaranKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranKegiatan $sasaranKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranKegiatanRequest $request, SasaranKegiatan $sasaranKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranKegiatan $sasaranKegiatan)
    {
        //
    }
    
    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.perda.perencanaan_kinerja.sasaran_kegiatan._partials.indicator', compact('iter'));
    }
}
