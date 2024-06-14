<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaKegiaIn;
use App\Http\Requests\StorePerdaKegiaInRequest;
use App\Http\Requests\UpdatePerdaKegiaInRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaKegiaInController extends AdminBaseController
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
    public function store(StorePerdaKegiaInRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaKegiaIn $perdaKegiaIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaKegiaIn $perdaKegiaIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaKegiaInRequest $request, PerdaKegiaIn $perdaKegiaIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaKegiaIn $perdaKegiaIn)
    {
        //
    }
}
