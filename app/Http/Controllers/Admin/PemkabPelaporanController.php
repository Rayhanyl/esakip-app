<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PemkabPelaporan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePemkabPelaporanRequest;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Requests\UpdatePemkabPelaporanRequest;

class PemkabPelaporanController extends AdminBaseController
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
        $pemkabPelaporan = PemkabPelaporan::all();
        return view('admin.pemkab.pelaporan.index', compact('pemkabPelaporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemkab.pelaporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PemkabPelaporan::create($request->only(PemkabPelaporan::FILLABLE_FIELDS));
        return to_route('admin.pemkab.pemkabPelaporan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPelaporan $pemkabPelaporan)
    {
        return view('admin.pemkab.pelaporan.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPelaporan $pemkabPelaporan)
    {
        return view('admin.pemkab.pelaporan.edit', compact('pemkabPelaporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PemkabPelaporan $pemkabPelaporan)
    {
        $pemkabPelaporan->update($request->only(PemkabPelaporan::FILLABLE_FIELDS));
        return to_route('admin.pemkab.pemkabPelaporan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPelaporan $pemkabPelaporan)
    {
        $pemkabPelaporan->delete();
        return to_route('admin.pemkab.pemkabPelaporan.index');
    }
}
