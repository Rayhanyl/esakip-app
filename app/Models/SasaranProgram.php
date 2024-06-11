<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranProgram extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'sasaran_strategis_id',
        'tahun',
        'sasaran_program',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indikators()
    {
        return $this->hasMany(SasaranProgramIndikator::class);
    }

    public function sasaran_kegiatans()
    {
        return $this->hasMany(SasaranKegiatan::class,'sasaran_program_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sasaranProgram) {
            $sasaranProgram->indikators()->delete();
        });
    }
}
