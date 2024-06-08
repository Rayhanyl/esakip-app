<?php

namespace App\Http\Controllers\Admin;

use PDO;
use Illuminate\Http\Request;
use App\Models\SasaranStrategis;
use App\Models\SasaranSubKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PerdaPengukuranKinerja;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SasaranStrategisIndikator;
use App\Models\SasaranSubKegiatanIndikator;
use App\Http\Requests\StorePerdaPengukuranKinerjaRequest;
use App\Http\Requests\UpdatePerdaPengukuranKinerjaRequest;

class PerdaPengukuranKinerjaController extends Controller
{
    public function __construct()
    {
        View::share('sasaran_strategis_options', SasaranStrategis::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_strategis;
        }));
        View::share('sasaran_sub_kegiatan_options', SasaranSubKegiatan::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_sub_kegiatan;
        }));
        View::share('tahun_options', collect(array_combine(range(2029, 2020, -1), range(2029, 2020, -1)))->transform(function ($list) {
            return $list;
        }));
        View::share('triwulan_options', collect(array_combine(['1', '2', '3', '4', 'tahun'], ['1', '2', '3', '4', 'Tahunan']))->transform(function ($list) {
            return $list;
        }));
        View::share('karakteristik_options', collect(array_combine(['1', '2'], ['Semakin tinggi realisasi maka capaian
            semakin bagus', 'Semakin rendah realisasi maka capaian semakin bagus']))->transform(function ($list) {
            return $list;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = PerdaPengukuranKinerja::all();
        $query = PerdaPengukuranKinerja::with('user')
            ->whereHas('user', function ($q) use ($request) {
                $q->where('role', '=', $request->session()->get('role'));
                // Tambahkan kondisi untuk filter berdasarkan user jika ada
                $q->where('id', '=', $request->session()->get('id_user'));
            });

        $data = $query->get();
        return view('admin.perda.pengukuran_kinerja.index', compact('data'));
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
            PerdaPengukuranKinerja::create(array_merge($request->except('tahunan_sasaran_strategis_id', 'tahunan_sasaran_strategis_indikator_id'), ['user_id' => Auth::user()->id]));
            Alert::toast('Berhasil menambahkan pengukuran kinerja', 'success');
            return redirect()->route('perda.pengukuran-kinerja.index')->with('success', 'Pengukuran Kinerja created successfully.');
        } catch (\Exception $e) {
            // Handle the error if any exception occurs
            Alert::toast('Error hubungi developer terkait!', 'error');
            return redirect()->back()->withErrors(['error' => 'Failed to store the data. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        return view('admin.perda.pengukuran_kinerja.edit', compact('perdaPengukuranKinerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        try {
            $perdaPengukuranKinerja->update($request->except('tahunan_sasaran_strategis_id', 'tahunan_sasaran_strategis_indikator_id'));
            Alert::toast('Berhasil mengubah pengukuran kinerja', 'success');
            return redirect()->route('perda.pengukuran-kinerja.index')->with('success', 'Pengukuran Kinerja update successfully.');
        } catch (\Exception $e) {
            // Handle the error if any exception occurs
            Alert::toast('Error hubungi developer terkait!', 'error');
            return redirect()->back()->withErrors(['error' => 'Failed to update the data. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $perdaPengukuranKinerja = PerdaPengukuranKinerja::findOrFail($id);
            $perdaPengukuranKinerja->delete();
            Alert::toast('Berhasil menghapus data Pengukuran Kinerja', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return an error message
            Alert::toast('Error hubungi developer terkait!', 'danger');
            return redirect()->back();
        }
    }

    public function get_indicator(Request $request)
    {
        $indicator = SasaranStrategisIndikator::whereSasaranStrategisId($request->id)->get();
        return response()->json($indicator);
    }

    public function get_indicator_sub_kegiatan(Request $request)
    {
        $indicator = SasaranSubKegiatanIndikator::whereSasaranSubKegiatanId($request->id)->get();
        return response()->json($indicator);
    }

    public function get_target_sub_kegiatan(Request $request)
    {
        $target = SasaranSubKegiatanIndikator::whereId($request->id)->first();
        switch ($request->triwulan) {
            case '1':
                $value = $target->triwulan1;
                break;
            case '2':
                $value = $target->triwulan2;
                break;
            case '3':
                $value = $target->triwulan3;
                break;
            case '4':
                $value = $target->triwulan4;
                break;
            default:
                $value = 0;
                break;
        }
        if ($value == null) {
            $value = 0;
        }
        return response()->json($value);
    }

    public function get_pagu_sub_kegiatan(Request $request)
    {
        $target = SasaranSubKegiatanIndikator::whereId($request->id)->get();
        return response()->json($target);
    }

    public function get_sasaran_strategis(Request $request)
    {
        $strategis = SasaranStrategis::whereTahun($request->tahun)->get();
        return response()->json($strategis);
    }

    public function get_target(Request $request)
    {
        $target = SasaranSubKegiatanIndikator::whereId($request->id)->get();
        return response()->json($target);
    }

    public function get_indicator_tahunan(Request $request)
    {
        $tahun = $request->get('tahun');
        $strategis = SasaranStrategis::where('tahun', $tahun)->get()->pluck('sasaran_strategis', 'id');
        return response()->json($strategis);
    }

    public function get_target_tahunan(Request $request)
    {
        $target = SasaranStrategisIndikator::whereId($request->id)->first();
        return response()->json($target->target1);
    }
}
