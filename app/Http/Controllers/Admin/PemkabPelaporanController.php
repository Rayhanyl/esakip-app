<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabPelaporan;
use App\Http\Requests\StorePemkabPelaporanRequest;
use App\Http\Requests\UpdatePemkabPelaporanRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabPelaporanController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePemkabPelaporanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPelaporan $pemkabPelaporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPelaporan $pemkabPelaporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabPelaporanRequest $request, PemkabPelaporan $pemkabPelaporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPelaporan $pemkabPelaporan)
    {
        //
    }
}
