<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranBupati;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranBupatiIndikator;
use App\Http\Requests\StoreSasaranBupatiRequest;
use App\Http\Requests\UpdateSasaranBupatiRequest;

class SasaranBupatiController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.index');
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
        $data = SasaranBupati::create(array_merge($request->except(['indikator_sasaran_bupati']), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator_sasaran_bupati as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_bupati_id' => $data->id]);
            SasaranBupatiIndikator::create($params);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranBupatiRequest $request, SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranBupati $sasaranBupati)
    {
        //
    }

    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati._partials.indicator', compact('iter'));
    }
}
