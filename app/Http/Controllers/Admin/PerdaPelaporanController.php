<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaPelaporan;
use App\Http\Requests\StorePerdaPelaporanRequest;
use App\Http\Requests\UpdatePerdaPelaporanRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaPelaporanController extends AdminBaseController
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
    public function store(StorePerdaPelaporanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPelaporan $perdaPelaporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPelaporan $perdaPelaporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPelaporanRequest $request, PerdaPelaporan $perdaPelaporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPelaporan $perdaPelaporan)
    {
        //
    }
}
