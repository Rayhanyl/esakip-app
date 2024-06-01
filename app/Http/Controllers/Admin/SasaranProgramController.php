<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranProgramIndikator;
use App\Http\Requests\StoreSasaranProgramRequest;
use App\Http\Requests\UpdateSasaranProgramRequest;

class SasaranProgramController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('sasaran_strategis_options', SasaranStrategis::all()->keyBy('id')->transform(function ($sasaran_strategis) {
            return $sasaran_strategis->sasaran_strategis;
        }));
        View::share('sasaran_program', SasaranProgram::all());
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
    public function store(Request $request)
    {
        $data =  SasaranProgram::create(array_merge($request->except('indikator_sasaran'), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator_sasaran as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_program_id' => $data->id]);
            SasaranProgramIndikator::create($params);
        }
        return redirect()->back();
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
