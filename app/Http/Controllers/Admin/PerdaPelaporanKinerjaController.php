<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PerdaPelaporanKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PelaporanKinerja::with('user')
            ->whereHas('user', function ($q) use ($request) {
                $q->where('role', '=', $request->session()->get('role'));
                // Tambahkan kondisi untuk filter berdasarkan user jika ada
                $q->where('id', '=', $request->session()->get('id_user'));
            });

        $data = $query->get();
        return view('admin.perda.pelaporan_kinerja.index', compact('data'));
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
        // Fetch the PelaporanKinerja record by id
        $data = PelaporanKinerja::where('id', $id)->first();
        return view('admin.pemkab.pelaporan_kinerja.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        try {
            // Fetch the existing record
            $pelaporanKinerja = PelaporanKinerja::findOrFail($id);

            // Update the record fields
            $pelaporanKinerja->tahun = $request->tahun;

            // Check if a new file is uploaded
            if ($request->hasFile('file')) {
                // Store the new file in the 'public/pelaporan-kinerja' directory
                $path = $request->file('file')->store('public/pelaporan-kinerja');

                // Update the 'upload' field with the new file name
                $pelaporanKinerja->upload = $request->file('file')->hashName();
            }

            // Save the updated record
            $pelaporanKinerja->save();

            Alert::toast('Berhasil memperbarui laporan kinerja', 'success');
            return redirect()->route('pemkab.pelaporan-kinerja.index')->with('success', 'Pelaporan Kinerja updated successfully.');
        } catch (\Exception $e) {
            // Handle the error if the update fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to update the record. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Fetch the existing record
            $pelaporanKinerja = PelaporanKinerja::findOrFail($id);

            // Optionally, delete the file from the storage if needed
            if ($pelaporanKinerja->upload) {
                Storage::delete('public/pelaporan-kinerja/' . $pelaporanKinerja->upload);
            }

            // Delete the record from the database
            $pelaporanKinerja->delete();

            Alert::toast('Berhasil menghapus laporan kinerja', 'success');
            return redirect()->route('pemkab.pelaporan-kinerja.index')->with('success', 'Pelaporan Kinerja deleted successfully.');
        } catch (\Exception $e) {
            // Handle the error if the deletion fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to delete the record. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function download($filename)
    {
        // Retrieve the file path from the storage
        $filePath = storage_path('app/public/pelaporan-kinerja/' . $filename);

        // Check if the file exists
        if (!Storage::exists('public/pelaporan-kinerja/' . $filename)) {
            // Set an error message in the session
            Alert::toast('Gagal download file', 'danger');
            return redirect()->back()->with('error', 'File not found.');
        }

        // Set a success message in the session
        Alert::toast('Berhasil download file', 'success');
        session()->flash('success', 'File downloaded successfully.');

        // Return the file for download
        return response()->download($filePath);
    }
}
