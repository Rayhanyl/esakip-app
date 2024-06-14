<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaKegia;
use App\Http\Requests\StorePerdaKegiaRequest;
use App\Http\Requests\UpdatePerdaKegiaRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaKegiaController extends AdminBaseController
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
    public function store(StorePerdaKegiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaKegia $perdaKegia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaKegia $perdaKegia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaKegiaRequest $request, PerdaKegia $perdaKegia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaKegia $perdaKegia)
    {
        //
    }
}
