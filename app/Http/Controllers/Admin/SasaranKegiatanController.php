<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Models\SasaranProgram;
use App\Models\PenanggungJawab;
use App\Models\SasaranKegiatan;
use App\Models\SasaranPengampu;
use App\Models\PengampuSementara;
use App\Models\SasaranSubKegiatan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranKegiatanIndikator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSasaranKegiatanRequest;
use App\Http\Requests\UpdateSasaranKegiatanRequest;

class SasaranKegiatanController extends Controller
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

        View::share('sasaran_program_options', SasaranProgram::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran_program;
        }));
        View::share('satuan_options', Satuan::all()->keyBy('id')->transform(function ($list) {
            return $list->satuan;
        }));
        View::share('sasaran_kegiatan', SasaranKegiatan::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::all();
        $penanggung_jawab = PenanggungJawab::all();
        return view('admin.perda.perencanaan_kinerja.sasaran_kegiatan.index', compact('satuan', 'penanggung_jawab'));
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
        $data =  SasaranKegiatan::create(array_merge($request->except('indikator_sasaran', 'pengampu_id'), ['user_id' => Auth::user()->id]));
        SasaranPengampu::create([
            'sasaran_id' => $data->id,
            'pengampu_sementara_id' => $request->pengampu_id,
        ]);
        foreach ($request->indikator_sasaran as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_kegiatan_id' => $data->id]);
            SasaranKegiatanIndikator::create($params);
        }
        Alert::toast('Berhasil menambahkan data sasaran kegiatan', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranKegiatan $sasaranKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranKegiatan $sasaranKegiatan)
    {
        return view('admin.perda.perencanaan_kinerja.sasaran_kegiatan.edit', compact('sasaranKegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranKegiatanRequest $request, SasaranKegiatan $sasaranKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranKegiatan $sasaranKegiatan, $id)
    {
        // Retrieve the SasaranStrategis record by ID
        $sasaranKegiatan = sasaranKegiatan::find($id);

        // Check if the record exists
        if (!$sasaranKegiatan) {
            // Return an error message if the record does not exist
            Alert::toast('Data sasaran kegiatan tidak ditemukan', 'danger');
            return redirect()->back();
        }

        try {
            // Attempt to delete the record
            $sasaranKegiatan->delete();

            // Return a success message
            Alert::toast('Berhasil menghapus data sasaran kegiatan', 'success');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to delete sasaranKegiatan: ' . $e->getMessage(), ['id' => $id]);

            // Return an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
        }

        return redirect()->back();
    }

    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.perda.perencanaan_kinerja.sasaran_kegiatan._partials.indicator', compact('iter'));
    }
}
