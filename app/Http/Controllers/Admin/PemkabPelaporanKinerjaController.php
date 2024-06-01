<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PemkabPelaporanKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PelaporanKinerja::with('user')->whereHas('user', function ($q) {
            return $q->where('role', '=', session('role'));
        })->get();
        return view('admin.pemkab.pelaporan_kinerja.index', compact('data'));
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
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        try {
            // Store the file in the 'public/media' directory
            $path = $request->file('file')->store('public/pelaporan-kinerja');

            // Create a new record in the database
            PelaporanKinerja::create([
                'user_id' => Auth::user()->id,
                'tahun' => $request->tahun,
                'upload' => $request->file->hashName(),
            ]);

            Alert::toast('Berhasil menambahkan laporan kinerja', 'success');
            return redirect()->route('pemkab.pelaporan-kinerja.index')->with('success', 'Pelaporan Kinerja created successfully.');
        } catch (\Exception $e) {
            // Handle the error if file storage fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to upload the file. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
