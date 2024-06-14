<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSubKegiaPengampu;
use App\Http\Requests\StorePerdaSubKegiaPengampuRequest;
use App\Http\Requests\UpdatePerdaSubKegiaPengampuRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSubKegiaPengampuController extends AdminBaseController
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
    public function store(StorePerdaSubKegiaPengampuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSubKegiaPengampu $perdaSubKegiaPengampu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSubKegiaPengampu $perdaSubKegiaPengampu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaSubKegiaPengampuRequest $request, PerdaSubKegiaPengampu $perdaSubKegiaPengampu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSubKegiaPengampu $perdaSubKegiaPengampu)
    {
        //
    }
}
