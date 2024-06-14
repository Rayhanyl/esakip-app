<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabSastraIn;
use App\Http\Requests\StorePemkabSastraInRequest;
use App\Http\Requests\UpdatePemkabSastraInRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabSastraInController extends AdminBaseController
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
    public function store(StorePemkabSastraInRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabSastraIn $pemkabSastraIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabSastraIn $pemkabSastraIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabSastraInRequest $request, PemkabSastraIn $pemkabSastraIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabSastraIn $pemkabSastraIn)
    {
        //
    }
}
