<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PemkabPelaporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
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
        $pemkabPelaporan = PemkabPelaporan::where('user_id', Auth::user()->id)->get();
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
        try {
            $validated = $request->validate([
                'tahun' => 'required|integer',
                'file' => 'required|file|mimes:doc,docx,pdf|max:10000',
                'keterangan' => 'nullable|string|max:1000',
            ]);
            $path = $request->file('file')->store('public/pelaporan-kinerja/pemkab');
            $fileName = basename($path);
            PemkabPelaporan::create([
                'user_id' => Auth::id(),
                'tahun' => $request->tahun,
                'file' => $fileName,
                'keterangan' => $request->keterangan,
            ]);
            Alert::toast('Berhasil menambahkan data!', 'success');
            return redirect()->route('admin.pemkab.pelaporan.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.pemkab.pelaporan.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Alert::toast('Gagal menambahkan data!', 'danger');
            return redirect()->route('admin.pemkab.pelaporan.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPelaporan $pelaporan)
    {
        $pemkabPelaporan = PemkabPelaporan::where('user_id', Auth::user()->id)->get();
        return view('admin.pemkab.pelaporan.index', compact('pemkabPelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPelaporan $pelaporan)
    {
        return view('admin.pemkab.pelaporan.edit', compact('pelaporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PemkabPelaporan $pelaporan, Request $request)
    {
        try {
            $validated = $request->validate([
                'tahun' => 'required|integer',
                'file' => 'nullable|file|mimes:doc,docx,pdf|max:10000',
                'keterangan' => 'nullable|string|max:1000',
            ]);

            $pelaporan->tahun = $request->tahun;
            $pelaporan->keterangan = $request->keterangan;

            if ($request->hasFile('file')) {
                if ($pelaporan->file && Storage::exists('public/pelaporan-kinerja/pemkab/' . $pelaporan->file)) {
                    Storage::delete('public/pelaporan-kinerja/pemkab/' . $pelaporan->file);
                }
                $path = $request->file('file')->store('public/pelaporan-kinerja/pemkab/');
                $pelaporan->file = basename($path);
            }
            $pelaporan->save();
            Alert::toast('Berhasil mengubah data!', 'success');
            return redirect()->route('admin.pemkab.pelaporan.index');
        } catch (\Exception $e) {
            Alert::toast('Gagal mengubah data!', 'danger');
            return redirect()->route('admin.pemkab.pelaporan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPelaporan $pelaporan)
    {
        try {
            if ($pelaporan->file) {
                Storage::delete('public/pelaporan-kinerja/pemkab/' . $pelaporan->file);
            }
            $pelaporan->delete();
            Alert::toast('Berhasil menghapus data!', 'success');
            return redirect()->route('admin.pemkab.pelaporan.index');
        } catch (\Exception $e) {
            Alert::toast('Gagal menghapus data!', 'danger');
            return redirect()->route('admin.pemkab.pelaporan.index');
        }
    }

    /**
     * Download the specified resource from storage.
     */
    public function download(PemkabPelaporan $pelaporan)
    {
        $filePath = storage_path('app/public/pelaporan-kinerja/pemkab/' . $pelaporan->file);
        if (!Storage::exists('public/pelaporan-kinerja/pemkab/' . $pelaporan->file)) {
            Alert::toast('Gagal download file', 'danger');
            return redirect()->back()->with('error', 'File not found.');
        }
        Alert::toast('Berhasil download file', 'success');
        session()->flash('success', 'File downloaded successfully.');
        return response()->download($filePath);
    }
}
