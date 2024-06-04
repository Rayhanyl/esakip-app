<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Models\SasaranBupati;
use App\Models\SasaranProgram;
use App\Models\PenanggungJawab;
use App\Models\SasaranStrategis;
use App\Models\PengampuSementara;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SasaranStrategisIndikator;
use App\Http\Requests\StoreSasaranStrategisRequest;
use App\Http\Requests\UpdateSasaranStrategisRequest;


class SasaranStrategisController extends Controller
{
    public function __construct()
    {
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('pengampu_sementara', PengampuSementara::all()->keyBy('id')->transform(function ($list) {
            $position = !empty($list->jabatan) ? $list->jabatan : (!empty($list->pelaksana) ? $list->pelaksana : $list->fungsional);
            return $list->nip_baru . ' - ' . $list->nama_pegawai . ' - ' . $position;
        }));
        View::share('sasaran_bupati_options', SasaranBupati::all()->keyBy('id')->transform(function ($sasaran_bupati) {
            return $sasaran_bupati->sasaran_bupati;
        }));
        View::share('sasaran_strategis', SasaranStrategis::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::all();
        $penanggung_jawab = PenanggungJawab::all();
        return view('admin.perda.perencanaan_kinerja.sasaran_strategis.index', compact('satuan', 'penanggung_jawab'));
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
            $data = SasaranStrategis::create(array_merge($request->except('indikator_sasaran'), ['user_id' => Auth::user()->id]));

            foreach ($request->indikator_sasaran as $value) {
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_strategis_id' => $data->id]);
                SasaranStrategisIndikator::create($params);
            }
            Alert::toast('Berhasil menyimpan data sasaran strategis', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the error if the deletion fails
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back()->withErrors(['file' => 'Failed to delete the record. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranStrategis $sasaranStrategis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranStrategis $sasaranStrategis)
    {
        $satuan = Satuan::all();
        $penanggung_jawab = PenanggungJawab::all();
        return view('admin.perda.perencanaan_kinerja.sasaran_kegiatan.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranStrategisRequest $request, SasaranStrategis $sasaranStrategis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranStrategis $sasaranStrategis)
    {
        // Attempt to delete the record
        try {
            // Delete the SasaranBupati record along with its associated SasaranBupatiIndikator records
            $sasaranStrategis->delete();

            // Return a success message
            Alert::toast('Berhasil menghapus data sasaran strategis', 'success');
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
        return view('admin.perda.perencanaan_kinerja.sasaran_strategis._partials.indicator', compact('iter'));
    }

    public function get_indicator(Request $request)
    {
        $indicators = SasaranStrategisIndikator::whereSasaranStrategisId($request->id)->get();
        return response()->json($indicators);
    }
}
