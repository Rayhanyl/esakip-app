<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSubKegiaIn;
use App\Http\Requests\StorePerdaSubKegiaInRequest;
use App\Http\Requests\UpdatePerdaSubKegiaInRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSubKegiaInController extends AdminBaseController
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
    public function store(StorePerdaSubKegiaInRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSubKegiaIn $perdaSubKegiaIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSubKegiaIn $perdaSubKegiaIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaSubKegiaInRequest $request, PerdaSubKegiaIn $perdaSubKegiaIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSubKegiaIn $perdaSubKegiaIn)
    {
        //
    }
}
