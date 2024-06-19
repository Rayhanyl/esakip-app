<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Models\PemkabSastraIn;
use App\Models\PemkabPengukuran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabPengukuranController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();

        View::share('sasaran_bupati_options', PemkabSastra::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengukuran = PemkabPengukuran::with('pemkab_sastra', 'pemkab_sastra_in')->get();
        return view('admin.pemkab.pengukuran.index', compact('pengukuran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemkab.pengukuran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'pemkab_sastra_id' => 'required',
                'pemkab_sastra_in_id' => 'required',
                'target' => 'required',
                'realisasi' => 'required',
                'capaian' => 'required',
                'karakteristik' => 'required',
            ]);

            PemkabPengukuran::create([
                'user_id' => Auth::id(),
                'pemkab_sastra_id' => $validated['pemkab_sastra_id'],
                'pemkab_sastra_in_id' => $validated['pemkab_sastra_in_id'],
                'tahun' => 0,
                'target' => $validated['target'],
                'realisasi' => $validated['realisasi'],
                'capaian' => $validated['capaian'],
                'karakteristik' => $validated['karakteristik'],
            ]);

            Alert::toast('Data berhasil dibuat', 'success');
            return redirect()->route('admin.pemkab.pengukuran.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            dd($e);
            Alert::toast('Gagal membuat data. Silakan coba lagi.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPengukuran $pemkabPengukuran)
    {
        $pengukuran = PemkabPengukuran::all();
        return view('admin.pemkab.pengukuran.index', compact('pengukuran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPengukuran $pengukuran)
    {
        return view('admin.pemkab.pengukuran.edit', compact('pengukuran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PemkabPengukuran $pengukuran, Request $request)
    {
        try {
            $request->validate([
                'pemkab_sastra_id' => 'required',
                'pemkab_sastra_in_id' => 'required',
                'target' => 'required',
                'realisasi' => 'required|numeric',
                'karakteristik' => 'required',
                'capaian' => 'required|numeric',
            ]);

            $pengukuran->pemkab_sastra_id = $request->pemkab_sastra_id;
            $pengukuran->pemkab_sastra_in_id = $request->pemkab_sastra_in_id;
            $pengukuran->target = $request->target;
            $pengukuran->realisasi = $request->realisasi;
            $pengukuran->karakteristik = $request->karakteristik;
            $pengukuran->capaian = $request->capaian;
            $pengukuran->user_id = Auth::id();
            $pengukuran->save();

            Alert::toast('Berhasil mengubah data', 'success');
            return redirect()->route('admin.pemkab.pengukuran.index');
        } catch (\Exception $e) {
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->with('error', 'Failed to update data. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPengukuran $pengukuran)
    {
        try {
            $pengukuran->delete();
            Alert::toast('Data berhasil dihapus', 'success');
            return redirect()->route('admin.pemkab.pengukuran.index');
        } catch (\Exception $e) {
            Alert::toast('Gagal menghapus data. Silakan coba lagi.', 'error');
            return redirect()->route('admin.pemkab.pengukuran.index');
        }
    }

    public function getIndicator(Request $request)
    {
        $indicators = PemkabSastraIn::wherePemkabSastraId($request->id)->get();
        return response()->json($indicators);
    }

    public function getTarget(Request $request)
    {
        $targets = PemkabSastraIn::whereId($request->id)->get();
        return response()->json($targets);
    }
}
