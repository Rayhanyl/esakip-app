<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Models\SasaranProgram;
use App\Models\PenanggungJawab;
use App\Models\SasaranKegiatan;
use App\Models\SasaranPengampu;
use App\Models\SasaranStrategis;
use App\Models\PengampuSementara;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranProgramIndikator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateSasaranProgramRequest;

class SasaranProgramController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('user_options', User::whereRole('perda')->get()->keyBy('id')->transform(function ($user) {
            return $user->name;
        }));
        View::share('sasaran_strategis_options', SasaranStrategis::all()->keyBy('id')->transform(function ($sasaran_strategis) {
            return $sasaran_strategis->sasaran_strategis;
        }));
        View::share('sasaran_program', SasaranProgram::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perda.perencanaan_kinerja.sasaran_program.index');
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
        $data =  SasaranProgram::create(array_merge($request->except('indikator_sasaran', 'pengampu_id'), ['user_id' => Auth::user()->id]));
        SasaranPengampu::create([
            'sasaran_id' => $data->id,
            'pengampu_sementara_id' => $request->pengampu_id,
        ]);
        foreach ($request->indikator_sasaran as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['sasaran_program_id' => $data->id]);
            SasaranProgramIndikator::create($params);
        }
        Alert::toast('Berhasil menambahkan data sasaran program', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranProgram $sasaranProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranProgram $sasaranProgram)
    {
        $sasaranProgram->load('indikators');
        $satuan = Satuan::all();
        $penanggung_jawab = PenanggungJawab::all();
        return view('admin.perda.perencanaan_kinerja.sasaran_program.edit', compact('satuan', 'penanggung_jawab', 'sasaranProgram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SasaranProgram $sasaranProgram)
    {
        $sasaranProgram->update($request->only(SasaranProgram::FILLABLE_FIELDS));
        $savedIds = [];
        foreach (($request->indikator_sasaran ?? []) as $indikator_sasaran) {
            if ($indikator_sasaran['id'] ?? false) {
                $params = SasaranProgramIndikator::find($indikator_sasaran['id']);
                $params->sasaran_program_id = $sasaranProgram->id ?? null;
                $params->indikator_sasaran_program = $indikator_sasaran['indikator_sasaran_program'] ?? null;
                $params->target = $indikator_sasaran['target'] ?? null;
                $params->satuan_id = $indikator_sasaran['satuan_id'] ?? null;
                $params->program = $indikator_sasaran['program'] ?? null;
                $params->anggaran = $indikator_sasaran['anggaran'] ?? null;
                $params->save();

                array_push($savedIds, $params->id);
            } else {
                $params = new SasaranProgramIndikator();
                $params->user_id = Auth::user()->id ?? null;
                $params->sasaran_program_id = $sasaranProgram->id ?? null;
                $params->indikator_sasaran_program = $indikator_sasaran['indikator_sasaran_program'] ?? null;
                $params->target = $indikator_sasaran['target'] ?? null;
                $params->satuan_id = $indikator_sasaran['satuan_id'] ?? null;
                $params->program = $indikator_sasaran['program'] ?? null;
                $params->anggaran = $indikator_sasaran['anggaran'] ?? null;
                $params->save();
                array_push($savedIds, $params->id);
            }
        }
        if (count($savedIds)) {
            SasaranProgramIndikator::where('sasaran_program_id', $sasaranProgram->id)->whereNotIn('id', $savedIds)->delete();
        } else {
            SasaranProgramIndikator::where('sasaran_program_id', $sasaranProgram->id)->delete();
        }
        Alert::toast('Data sasaran program telah diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranProgram $sasaranProgram, $id)
    {
        // Retrieve the SasaranStrategis record by ID
        $sasaranProgram = SasaranProgram::find($id);

        // Check if the record exists
        if (!$sasaranProgram) {
            // Return an error message if the record does not exist
            Alert::toast('Data sasaran program tidak ditemukan', 'danger');
            return redirect()->back();
        }

        try {
            // Attempt to delete the record
            $sasaranProgram->delete();

            // Return a success message
            Alert::toast('Berhasil menghapus data sasaran program', 'success');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to delete SasaranProgram: ' . $e->getMessage(), ['id' => $id]);

            // Return an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
        }

        return redirect()->back();
    }

    public function indicator(Request $request)
    {
        $iter = $request->iter;
        return view('admin.perda.perencanaan_kinerja.sasaran_program._partials.indicator', compact('iter'));
    }
}
