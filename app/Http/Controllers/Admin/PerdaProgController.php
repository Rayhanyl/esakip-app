<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaProg;
use App\Http\Requests\StorePerdaProgRequest;
use App\Http\Requests\UpdatePerdaProgRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaProgController extends AdminBaseController
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
    public function store(StorePerdaProgRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaProg $perdaProg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaProg $perdaProg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaProgRequest $request, PerdaProg $perdaProg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaProg $perdaProg)
    {
        //
    }
}
