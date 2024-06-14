<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaPengSubTriw;
use App\Http\Requests\StorePerdaPengSubTriwRequest;
use App\Http\Requests\UpdatePerdaPengSubTriwRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaPengSubTriwController extends AdminBaseController
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
    public function store(StorePerdaPengSubTriwRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPengSubTriw $perdaPengSubTriw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPengSubTriw $perdaPengSubTriw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPengSubTriwRequest $request, PerdaPengSubTriw $perdaPengSubTriw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPengSubTriw $perdaPengSubTriw)
    {
        //
    }
}
