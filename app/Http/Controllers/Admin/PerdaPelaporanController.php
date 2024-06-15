<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PerdaPelaporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
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
        $perdaPelaporan = PerdaPelaporan::where('user_id', Auth::user()->id)->get();
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
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'tahun' => 'required|integer',
                'file' => 'required|file|mimes:doc,docx,pdf|max:10000',
                'keterangan' => 'nullable|string|max:1000',
            ]);
            $path = $request->file('file')->store('public/pelaporan-kinerja/perda');
            $fileName = basename($path);
            PerdaPelaporan::create([
                'user_id' => Auth::id(),
                'tahun' => $request->tahun,
                'file' => $fileName,
                'keterangan' => $request->keterangan,
            ]);
            Alert::toast('Berhasil menambahkan data!', 'success');
            return redirect()->route('admin.perda.pelaporan.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.perda.pelaporan.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Alert::toast('Gagal menambahkan data!', 'danger');
            return redirect()->route('admin.perda.pelaporan.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPelaporan $pelaporan)
    {
        $perdaPelaporan = PerdaPelaporan::where('user_id', Auth::user()->id);
        return view('admin.perda.pelaporan.index', compact('perdaPelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPelaporan $pelaporan)
    {
        return view('admin.perda.pelaporan.edit', compact('pelaporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerdaPelaporan $pelaporan, Request $request,)
    {
        try {
            $validated = $request->validate([
                'tahun' => 'required|integer',
                'file' => 'nullable|file|mimes:doc,docx,pdf|max:10000',
                'keterangan' => 'nullable|string|max:1000',
            ]);
            $pelaporan->tahun = $request->tahun;
            $pelaporan->keterangan = $request->keterangan;
            $pelaporan->user_id = Auth::user()->id;
            if ($request->hasFile('file')) {
                if ($pelaporan->file && Storage::exists('public/pelaporan-kinerja/perda/' . $pelaporan->file)) {
                    Storage::delete('public/pelaporan-kinerja/perda/' . $pelaporan->file);
                }
                $path = $request->file('file')->store('public/pelaporan-kinerja/perda/');
                $pelaporan->file = basename($path);
            }
            $pelaporan->save();
            Alert::toast('Berhasil mengubah data!', 'success');
            return redirect()->route('admin.perda.pelaporan.index');
        } catch (\Exception $e) {
            dd($e);
            Alert::toast('Gagal mengubah data!', 'danger');
            return redirect()->route('admin.perda.pelaporan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPelaporan $pelaporan)
    {
        try {
            if ($pelaporan->file) {
                Storage::delete('public/pelaporan-kinerja/perda/' . $pelaporan->file);
            }
            $pelaporan->delete();
            Alert::toast('Berhasil menghapus data!', 'success');
            return redirect()->route('admin.perda.pelaporan.index');
        } catch (\Exception $e) {
            Alert::toast('Gagal menghapus data!', 'danger');
            return redirect()->route('admin.perda.pelaporan.index');
        }
    }

    /**
     * Download the specified resource from storage.
     */
    public function download(PerdaPelaporan $pelaporan)
    {
        $filePath = storage_path('app/public/pelaporan-kinerja/perda/' . $pelaporan->file);
        if (!Storage::exists('public/pelaporan-kinerja/perda/' . $pelaporan->file)) {
            Alert::toast('Gagal download file', 'danger');
            return redirect()->back()->with('error', 'File not found.');
        }
        Alert::toast('Berhasil download file', 'success');
        session()->flash('success', 'File downloaded successfully.');
        return response()->download($filePath);
    }
}
