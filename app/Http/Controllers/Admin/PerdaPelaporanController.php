<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaPelaporan;
use App\Http\Requests\StorePerdaPelaporanRequest;
use App\Http\Requests\UpdatePerdaPelaporanRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaPelaporanController extends AdminBaseController
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
        $perdaPelaporan = PerdaPelaporan::all();
        return view('admin.perda.pelaporan.index', compact('perdaPelaporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perda.pelaporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerdaPelaporanRequest $request)
    {
        PerdaPelaporan::create($request->only(PerdaPelaporan::FILLABLE_FIELDS));
        return to_route('admin.perda.perdaPelaporan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPelaporan $perdaPelaporan)
    {
        return view('admin.perda.pelaporan.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPelaporan $perdaPelaporan)
    {
        return view('admin.perda.pelaporan.edit', compact('perdaPelaporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPelaporanRequest $request, PerdaPelaporan $perdaPelaporan)
    {
        $perdaPelaporan->update($request->only(PerdaPelaporan::FILLABLE_FIELDS));
        return to_route('admin.perda.perdaPelaporan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPelaporan $perdaPelaporan)
    {
        $perdaPelaporan->delete();
        return to_route('admin.perda.perdaPelaporan.index');
    }
}
