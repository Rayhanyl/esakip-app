<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StorePemkabSastraRequest;
use App\Http\Requests\UpdatePemkabSastraRequest;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabSastraController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('pemkabSastraData', PemkabSastra::all());
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
        $pemkabSastra->load('pemkab_sastra_ins');
        return view('admin.pemkab.sastra.edit', compact('pemkabSastra'));
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

    public function indicator()
    {
        return view('admin.pemkab.sastra._partials.indicator');
    }

    public function penanggung_jawab(Request $request)
    {
        $params = $request->params;
        return view('admin.pemkab.sastra._partials.penanggung_jawab', compact('params'));
    }

    public function simple_action(Request $request)
    {
        $params = $request->params;
        return view('admin.pemkab.sastra._partials.simple_action', compact('params'));
    }
}
