<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranBupati;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranBupatiIndikator;
use App\Models\PemkabPengukuranKinerja;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSasaranBupatiRequest;
use App\Http\Requests\UpdateSasaranBupatiRequest;

class SasaranBupatiController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sasaran_bupati = SasaranBupati::all();
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.index', compact('sasaran_bupati'));
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
            // Attempt to create the SasaranBupati record
            $data = SasaranBupati::create(array_merge($request->except(['indikator_sasaran_bupati']), ['user_id' => Auth::user()->id]));

            // Create associated SasaranBupatiIndikator records
            foreach ($request->indikator_sasaran_bupati as $value) {
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_bupati_id' => $data->id]);
                SasaranBupatiIndikator::create($params);
            }

            // Return a success message
            Alert::toast('Data sasaran bupati berhasil dibuat', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return a failure message
            Alert::toast('Gagal membuat data sasaran bupati. Silakan coba lagi.', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranBupati $sasaranBupati)
    {
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranBupatiRequest $request, SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranBupati $sasaranBupati)
    {
        // Check if the SasaranBupati is associated with any PengukuranKinerja records
        if (PemkabPengukuranKinerja::where('sasaran_bupati_id', $sasaranBupati->id)->exists()) {
            // If associated records exist, display an error message
            Alert::toast('Sasaran Bupati ini sudah digunakan dalam pengukuran kinerja dan tidak dapat dihapus.', 'error');
            return redirect()->back();
        }

        // Attempt to delete the record
        try {
            // Delete the SasaranBupati record along with its associated SasaranBupatiIndikator records
            $sasaranBupati->delete();

            // Return a success message
            Alert::toast('Berhasil menghapus data sasaran bupati beserta indikatornya', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back();
        }
    }

    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati._partials.indicator', compact('iter'));
    }
}
