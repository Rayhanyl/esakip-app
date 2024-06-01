<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SasaranSubKegiatan;
use App\Http\Requests\StoreSasaranSubKegiatanRequest;
use App\Http\Requests\UpdateSasaranSubKegiatanRequest;

class SasaranSubKegiatanController extends Controller
{
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
    public function store(StoreSasaranSubKegiatanRequest $request)
    {
        //
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
}
