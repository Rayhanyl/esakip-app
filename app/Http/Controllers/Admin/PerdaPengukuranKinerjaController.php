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
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerdaPengukuranKinerja::all();
        dd($data);
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
            PerdaPengukuranKinerja::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPengukuranKinerjaRequest $request, PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }

    public function get_indicator(Request $request)
    {
        $indicator = SasaranSubKegiatanIndikator::whereSasaranSubKegiatanId($request->id)->get();
        return response()->json($indicator);
    }

    public function get_target(Request $request)
    {
        $target = SasaranSubKegiatanIndikator::whereId($request->id)->get();
        return response()->json($target);
    }
}
