<?php

namespace App\Http\Controllers\PerangkatDaerah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerangkatDaerahController extends Controller
{
    public function index(){
        return view('perda.index');
    }

    public function sasaranStrategis()
    {
        return view('perda.perencanaan_kinerja.sasaran_strategis');
    }

    public function sasaranProgram()
    {
        return view('perda.perencanaan_kinerja.sasaran_program');
    }

    public function sasaranKegiatan()
    {
        return view('perda.perencanaan_kinerja.sasaran_kegiatan');
    }
    
    public function sasaranSubKegiatan()
    {
        return view('perda.perencanaan_kinerja.sasaran_subkegiatan');
    }

    public function pengukuranKinerja()
    {
        return view('perda.pengukuran_kinerja');
    }

    public function pelaporanKinerja()
    {
        return view('perda.pelaporan_kinerja');
    }

    public function evaluasiInternal()
    {
        return view('perda.evaluasi_internal');
    }
}
