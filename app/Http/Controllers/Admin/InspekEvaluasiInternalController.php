<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InspekEvaluasiInternal;
use App\Http\Requests\StoreInspekEvaluasiInternalRequest;
use App\Http\Requests\UpdateInspekEvaluasiInternalRequest;

class InspekEvaluasiInternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.inspek.evaluasi_internal.index');
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
    public function store(StoreInspekEvaluasiInternalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInspekEvaluasiInternalRequest $request, InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InspekEvaluasiInternal $inspekEvaluasiInternal)
    {
        //
    }
}
