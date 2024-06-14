<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaPengSubTahun;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Requests\StorePerdaPengSubTahunRequest;
use App\Http\Requests\UpdatePerdaPengSubTahunRequest;

class PerdaPengSubTahunController extends AdminBaseController
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
    public function store(StorePerdaPengSubTahunRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPengSubTahun $perdaPengSubTahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPengSubTahun $perdaPengSubTahun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPengSubTahunRequest $request, PerdaPengSubTahun $perdaPengSubTahun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPengSubTahun $perdaPengSubTahun)
    {
        //
    }
}
