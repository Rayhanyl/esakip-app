<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranProgram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreSasaranProgramRequest;
use App\Http\Requests\UpdateSasaranProgramRequest;

class SasaranProgramController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('sasaran_bupati_options', SasaranBupati::all()->keyBy('id')->transform(function ($sasaran_bupati) {
            return $sasaran_bupati->sasaran_bupati;
        }));
        View::share('sasaran_strategis', SasaranStrategis::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perda.perencanaan_kinerja.sasaran_program.index');
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
    public function store(StoreSasaranProgramRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranProgram $sasaranProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranProgram $sasaranProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranProgramRequest $request, SasaranProgram $sasaranProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranProgram $sasaranProgram)
    {
        //
    }

    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.perda.perencanaan_kinerja.sasaran_program._partials.indicator', compact('iter'));
    }
}
