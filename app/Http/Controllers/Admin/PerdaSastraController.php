<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSastra;
use App\Http\Requests\StorePerdaSastraRequest;
use App\Http\Requests\UpdatePerdaSastraRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSastraController extends AdminBaseController
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
    public function store(StorePerdaSastraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSastra $perdaSastra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSastra $perdaSastra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaSastraRequest $request, PerdaSastra $perdaSastra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSastra $perdaSastra)
    {
        //
    }
}
