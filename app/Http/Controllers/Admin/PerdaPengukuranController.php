<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaPengukuran;
use App\Http\Requests\StorePerdaPengukuranRequest;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Requests\UpdatePerdaPengukuranRequest;

class PerdaPengukuranController extends AdminBaseController
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
    public function store(StorePerdaPengukuranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPengukuran $perdaPengukuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPengukuran $perdaPengukuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPengukuranRequest $request, PerdaPengukuran $perdaPengukuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPengukuran $perdaPengukuran)
    {
        //
    }
}
