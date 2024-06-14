<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSastraIn;
use App\Http\Requests\StorePerdaSastraInRequest;
use App\Http\Requests\UpdatePerdaSastraInRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSastraInController extends AdminBaseController
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
    public function store(StorePerdaSastraInRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSastraIn $perdaSastraIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSastraIn $perdaSastraIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaSastraInRequest $request, PerdaSastraIn $perdaSastraIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSastraIn $perdaSastraIn)
    {
        //
    }
}
