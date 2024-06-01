<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaPengukuranKinerja extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function sasaran_strategis()
    {
        $this->belongsTo(SasaranStrategis::class);
    }

    public function sasaran_strategis_indikator()
    {
        $this->belongsTo(SasaranStrategisIndikator::class);
    }

    public function sasaran_sub_kegiatan()
    {
        $this->belongsTo(SasaranSubKegiatan::class);
    }

    public function sasaran_sub_kegiatan_indikator()
    {
        $this->belongsTo(SasaranSubKegiatanIndikator::class);
    }

    public function anggaran_sub_kegiatan()
    {
        $this->belongsTo(SasaranSubKegiatan::class, 'id', 'anggaran_sub_kegiatan_id');
    }

    public function tahunan_sasaran_strategis()
    {
        $this->belongsTo(SasaranStrategis::class, 'id', 'tahunan_sasaran_strategis_id');
    }

    public function tahunan_sasaran_strategis_indikator()
    {
        $this->belongsTo(SasaranStrategisIndikator::class, 'id', 'tahunan_sasaran_strategis_indikator_id');
    }
}
