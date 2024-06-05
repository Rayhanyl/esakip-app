<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Satuan;
use App\Models\SimpleAction;
use Illuminate\Http\Request;
use App\Models\SasaranBupati; 
use App\Models\SasaranPengampu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranBupatiIndikator;
use App\Models\SasaranPenanggungJawab;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateSasaranBupatiRequest;

class SasaranBupatiController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('pemkab')->get()->keyBy('id')->transform(function ($list) {
            return $list->name;
        }));
        View::share('satuan_options', Satuan::all()->keyBy('id')->transform(function ($list) {
            return $list->satuan;
        }));
        View::share('tipe_perhitungan_options', collect(array_combine(
            ["1", "2"],
            ["Kumulatif", "Non-Kumulatif"],
        ))->transform(function ($list) {
            return $list;
        }));
        View::share('sasaran_bupati', SasaranBupati::all());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.index');
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
            $data = SasaranBupati::create(array_merge($request->except(['indikator_sasaran_bupati', 'pengampu_id']), ['user_id' => Auth::user()->id]));
            SasaranPengampu::create([
                'sasaran_id' => $data->id,
                'pengampu_sementara_id' => $request->pengampu_id,
            ]);

            // Create associated SasaranBupatiIndikator records
            foreach ($request->indikator_sasaran_bupati as $value) {
                $simple_actions = $value['simple_action'];
                unset($value['simple_action']);
                $penanggung_jawabs = $value['penanggung_jawab'];
                unset($value['penanggung_jawab']);
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_bupati_id' => $data->id]);
                $data_indikator = SasaranBupatiIndikator::create($params);
                foreach ($simple_actions as $simple_action) {
                    SimpleAction::create([
                        'sasaran_bupati_indikator_id' => $data_indikator->id,
                        'simple_action' => $simple_action
                    ]);
                }
                foreach ($penanggung_jawabs as $penanggung_jawab) {
                    SasaranPenanggungJawab::create([
                        'sasaran_id' => $data_indikator->id,
                        'penanggung_jawab' => $penanggung_jawab
                    ]);
                }
            }

            // Return a success message
            Alert::toast('Data sasaran bupati berhasil dibuat', 'success');
            return redirect()->back();
            // Attempt to create the SasaranBupati record
        } catch (\Exception $e) {
            dd($e);
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
    public function edit(Request $request)
    {
        // Retrieve the SasaranBupati instance by its ID
        $data = SasaranBupati::with('sasaran_bupati_indikators')->findOrFail(1);
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.edit',compact('data'));
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
        $tahun = $request->tahun;
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati._partials.indicator', compact('iter', 'tahun'));
    }

    public function simple_action(Request $request)
    {
        $iter = $request->iter;
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati._partials.simple-action', compact('iter'));
    }

    public function penanggung_jawab(Request $request)
    {
        $iter = $request->iter;
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati._partials.penanggung-jawab', compact('iter'));
    }
}
