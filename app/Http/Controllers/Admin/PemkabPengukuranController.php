<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabPengukuran;
use App\Http\Requests\StorePemkabPengukuranRequest;
use App\Http\Requests\UpdatePemkabPengukuranRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabPengukuranController extends AdminBaseController
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
    public function store(StorePemkabPengukuranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPengukuran $pemkabPengukuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPengukuran $pemkabPengukuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabPengukuranRequest $request, PemkabPengukuran $pemkabPengukuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPengukuran $pemkabPengukuran)
    {
        //
    }
}
