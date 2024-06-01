<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SasaranBupati;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranBupatiIndikator;
use App\Models\PemkabPengukuranKinerja;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePemkabPengukuranKinerjaRequest;
use App\Http\Requests\UpdatePemkabPengukuranKinerjaRequest;

class PemkabPengukuranKinerjaController extends Controller
{
    public function __construct()
    {
        View::share('sasaran_bupati_options', SasaranBupati::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_bupati;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PemkabPengukuranKinerja::with('sasaran_bupati', 'sasaran_bupati_indikator')->get();
        return view('admin.pemkab.pengukuran_kinerja.index', compact('data'));
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
        try {
            // Attempt to create the PemkabPengukuranKinerja record
            PemkabPengukuranKinerja::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));

            // Return a success message
            Alert::toast('Data pengukuran kinerja berhasil dibuat', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return a failure message
            Alert::toast('Gagal membuat data pengukuran kinerja. Silakan coba lagi.', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPengukuranKinerja $id)
    {
        // Retrieve the specific record using route model binding
        $data = $id->load('sasaran_bupati', 'sasaran_bupati_indikator');
        return view('admin.pemkab.pengukuran_kinerja.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'sasaran_bupati_id' => 'required',
                'sasaran_bupati_indikator_id' => 'required',
                'target' => 'required',
                'realisasi' => 'required|numeric',
                'karakteristik' => 'required',
                'capaian' => 'required',
            ]);

            // Find the PemkabPengukuranKinerja model instance by its ID
            $pemkabPengukuranKinerja = PemkabPengukuranKinerja::findOrFail($id);

            // Update the model instance with the new data
            $pemkabPengukuranKinerja->sasaran_bupati_id = $request->sasaran_bupati_id;
            $pemkabPengukuranKinerja->sasaran_bupati_indikator_id = $request->sasaran_bupati_indikator_id;
            $pemkabPengukuranKinerja->target = $request->target;
            $pemkabPengukuranKinerja->realisasi = $request->realisasi;
            $pemkabPengukuranKinerja->karakteristik = $request->karakteristik;
            $pemkabPengukuranKinerja->capaian = $request->capaian;

            // Save the updated model instance
            $pemkabPengukuranKinerja->save();

            // Redirect back with a success message
            Alert::toast('Berhasil mengubah data pengukuran kinerja', 'success');
            return redirect()->route('pemkab.pengukuran-kinerja.index');
        } catch (\Exception $e) {
            // Redirect back with an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->with('error', 'Failed to update data. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPengukuranKinerja $id)
    {
        // Attempt to delete the record
        try {
            // Delete the record
            $id->delete();
            // Return a success message
            Alert::toast('Berhasil menghapus data pengukuran kinerja', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return response()->json(['error' => 'Failed to delete the record. Please try again.'], 500);
        }
    }

    public function indicator()
    {
    }

    public function get_indicator(Request $request)
    {
        $indicators = SasaranBupatiIndikator::whereSasaranBupatiId($request->id)->get();
        return response()->json($indicators);
    }

    public function get_target(Request $request)
    {
        $targets = SasaranBupatiIndikator::whereId($request->id)->get();
        return response()->json($targets);
    }
}
