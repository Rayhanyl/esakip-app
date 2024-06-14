<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSubKegia;
use App\Http\Requests\StorePerdaSubKegiaRequest;
use App\Http\Requests\UpdatePerdaSubKegiaRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSubKegiaController extends AdminBaseController
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
    public function store(StorePerdaSubKegiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSubKegia $perdaSubKegia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSubKegia $perdaSubKegia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaSubKegiaRequest $request, PerdaSubKegia $perdaSubKegia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSubKegia $perdaSubKegia)
    {
        //
    }
}
