<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabSastra;
use App\Http\Requests\StorePemkabSastraRequest;
use App\Http\Requests\UpdatePemkabSastraRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabSastraController extends AdminBaseController
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
        return view('admin.pemkab.sastra.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemkab.sastra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemkabSastraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabSastra $pemkabSastra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabSastra $pemkabSastra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabSastraRequest $request, PemkabSastra $pemkabSastra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabSastra $pemkabSastra)
    {
        //
    }
}
