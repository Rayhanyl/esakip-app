<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSastraPenja;
use App\Http\Requests\StorePerdaSastraPenjaRequest;
use App\Http\Requests\UpdatePerdaSastraPenjaRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSastraPenjaController extends AdminBaseController
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
    public function store(StorePerdaSastraPenjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSastraPenja $perdaSastraPenja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSastraPenja $perdaSastraPenja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaSastraPenjaRequest $request, PerdaSastraPenja $perdaSastraPenja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSastraPenja $perdaSastraPenja)
    {
        //
    }
}
