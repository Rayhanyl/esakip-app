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

class SasaranBupatiController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('user_options', User::whereRole('pemkab')->get()->keyBy('id')->transform(function ($list) {
            return $list->name;
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
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.create');
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
                $simple_actions = $value['simple_action'] ?? [];
                unset($value['simple_action']);
                $new_simple_actions = $value['new_simple_action'] ?? [];
                unset($value['new_simple_action']);
                $penanggung_jawabs = $value['penanggung_jawab'] ?? [];
                unset($value['penanggung_jawab']);
                $new_penanggung_jawabs = $value['new_penanggung_jawab'] ?? [];
                unset($value['new_penanggung_jawab']);
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_bupati_id' => $data->id]);
                $data_indikator = SasaranBupatiIndikator::create($params);
                foreach ($simple_actions as $simple_action) {
                    SimpleAction::create([
                        'sasaran_bupati_indikator_id' => $data_indikator->id,
                        'simple_action' => $simple_action
                    ]);
                }
                foreach ($new_simple_actions as $new_simple_actions) {
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
                foreach ($new_penanggung_jawabs as $new_penanggung_jawabs) {
                    SasaranPenanggungJawab::create([
                        'sasaran_id' => $data_indikator->id,
                        'penanggung_jawab' => $penanggung_jawab
                    ]);
                }
            }

            // Return a success message
            Alert::toast('Data sasaran bupati berhasil dibuat', 'success');
            return redirect()->route('pemkab.perencanaan-kinerja.index');
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
    public function edit($perencaanKinerja)
    {
        $sasaranBupati = SasaranBupati::with('sasaran_bupati_indikators', 'sasaran_bupati_indikators.sasaran_penanggung_jawabs', 'sasaran_bupati_indikators.simple_actions')->find($perencaanKinerja);
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.edit', compact('sasaranBupati'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $sasaranBupati)
    {
        try {
            $sasaranBupati = SasaranBupati::find($sasaranBupati);
            $sasaranBupati->update($request->except('indikator_sasaran_bupati', 'new_indikator_sasaran_bupati', 'pengampu_id'));
            foreach ($request->indikator_sasaran_bupati as $key => $value) {
                $simple_actions = $value['simple_action'] ?? [];
                unset($value['simple_action']);
                $new_simple_actions = $value['new_simple_action'] ?? [];
                unset($value['new_simple_action']);
                $penanggung_jawabs = $value['penanggung_jawab'] ?? [];
                unset($value['penanggung_jawab']);
                $new_penanggung_jawabs = $value['new_penanggung_jawab'] ?? [];
                unset($value['new_penanggung_jawab']);
                $params = array_merge($value, ['sasaran_bupati_id' => $sasaranBupati->id]);
                $indikator = SasaranBupatiIndikator::find($key);
                if ($indikator != null) {
                    $indikator->update($params);
                    foreach ($penanggung_jawabs ?? [] as $key2 => $penanggung_jawab) {
                        $paramsspj = [
                            'sasaran_id' => $indikator->id,
                            'penanggung_jawab' => $penanggung_jawab
                        ];
                        SasaranPenanggungJawab::find($key2)->update($paramsspj);
                    }
                    foreach ($simple_actions ?? [] as $key2 => $simple_action) {
                        $paramssa = [
                            'sasaran_bupati_indikator_id' => $indikator->id,
                            'simple_action' => $simple_action
                        ];
                        SimpleAction::find($key2)->update($paramssa);
                    }
                } else {
                    $params = array_merge($params, ['user_id' => Auth::user()->id]);
                    $indikator = SasaranBupatiIndikator::create($params);
                    foreach ($penanggung_jawabs ?? [] as $key2 => $penanggung_jawab) {
                        $paramsspj = [
                            'sasaran_id' => $indikator->id,
                            'penanggung_jawab' => $penanggung_jawab
                        ];
                        SasaranPenanggungJawab::create($paramsspj);
                    }
                    foreach ($simple_actions ?? [] as $key2 => $simple_action) {
                        $paramssa = [
                            'sasaran_bupati_indikator_id' => $indikator->id,
                            'simple_action' => $simple_action
                        ];
                        SimpleAction::create($paramssa);
                    }
                }
                foreach ($new_penanggung_jawabs ?? [] as $key2 => $new_penanggung_jawab) {
                    $paramsspj = [
                        'sasaran_id' => $indikator->id,
                        'penanggung_jawab' => $new_penanggung_jawab
                    ];
                    SasaranPenanggungJawab::create($paramsspj);
                }
                foreach ($new_simple_actions ?? [] as $key2 => $new_simple_action) {
                    $paramssa = [
                        'sasaran_bupati_indikator_id' => $indikator->id,
                        'simple_action' => $new_simple_action
                    ];
                    SimpleAction::create($paramssa);
                }
            }
            Alert::toast('Berhasil menyimpan data sasaran bupati', 'success');
            return redirect()->route('pemkab.perencanaan-kinerja.index');
        } catch (\Exception $e) {
            dd($e);
            // Handle the error if the deletion fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to delete the record. Please try again.']);
        }
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
