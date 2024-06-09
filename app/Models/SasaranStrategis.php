<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranStrategis extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indikators()
    {
        return $this->hasMany(SasaranStrategisIndikator::class);
    }

    public function sasaran_program()
    {
        return $this->belongsTo(SasaranProgram::class, 'id', 'sasaran_strategis_id');
    }

    public function indikator_sasaran_program()
    {
        return $this->hasMany(SasaranProgramIndikator::class, 'id', 'sasaran_program_id');
    }

    public function sasaran_kegiatan()
    {
        return $this->belongsTo(SasaranKegiatan::class, 'id', 'sasaran_program_id');
    }

    public function indikator_sasaran_kegiatan()
    {
        return $this->hasMany(SasaranKegiatanIndikator::class, 'id', 'sasaran_kegiatan_id');
    }

    public function sasaran_subkegiatan()
    {
        return $this->belongsTo(SasaranSubKegiatan::class, 'id', 'sasaran_kegiatan_id');
    }

    public function indikator_sasaran_subkegiatan()
    {
        return $this->hasMany(SasaranSubKegiatanIndikator::class, 'id', 'sasaran_sub_kegiatan_id');
    }

    public function sasaran_penanggungjawab()
    {
        return $this->belongsTo(SasaranPenanggungJawab::class, 'id', 'sasaran_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sasaranStrategis) {
            $sasaranStrategis->indikators()->delete();
        });
    }
}
