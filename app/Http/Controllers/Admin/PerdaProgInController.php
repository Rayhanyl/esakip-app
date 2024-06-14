<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaProgIn;
use App\Http\Requests\StorePerdaProgInRequest;
use App\Http\Requests\UpdatePerdaProgInRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaProgInController extends AdminBaseController
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
    public function store(StorePerdaProgInRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaProgIn $perdaProgIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaProgIn $perdaProgIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaProgInRequest $request, PerdaProgIn $perdaProgIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaProgIn $perdaProgIn)
    {
        //
    }
}
