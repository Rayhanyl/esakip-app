<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabSimact;
use App\Http\Requests\StorePemkabSimactRequest;
use App\Http\Requests\UpdatePemkabSimactRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabSimactController extends AdminBaseController
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
    public function store(StorePemkabSimactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabSimact $pemkabSimact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabSimact $pemkabSimact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabSimactRequest $request, PemkabSimact $pemkabSimact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabSimact $pemkabSimact)
    {
        //
    }
}
