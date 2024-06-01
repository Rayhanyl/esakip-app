<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PemkabPengukuranKinerja;
use App\Http\Requests\StorePemkabPengukuranKinerjaRequest;
use App\Http\Requests\UpdatePemkabPengukuranKinerjaRequest;

class PemkabPengukuranKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemkab.pengukuran_kinerja.index');
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
    public function store(StorePemkabPengukuranKinerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabPengukuranKinerjaRequest $request, PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }
}
