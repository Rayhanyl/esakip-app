<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SasaranProgram;
use App\Http\Requests\StoreSasaranProgramRequest;
use App\Http\Requests\UpdateSasaranProgramRequest;

class SasaranProgramController extends Controller
{
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
}
