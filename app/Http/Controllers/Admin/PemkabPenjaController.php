<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabPenja;
use App\Http\Requests\StorePemkabPenjaRequest;
use App\Http\Requests\UpdatePemkabPenjaRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabPenjaController extends AdminBaseController
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
    public function store(StorePemkabPenjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPenja $pemkabPenja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPenja $pemkabPenja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabPenjaRequest $request, PemkabPenja $pemkabPenja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPenja $pemkabPenja)
    {
        //
    }
}
