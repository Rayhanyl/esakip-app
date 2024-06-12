<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranKegiatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indikators()
    {
        return $this->hasMany(SasaranKegiatanIndikator::class);
    }

    public function sasaran_sub_kegiatans()
    {
        return $this->hasMany(SasaranSubKegiatan::class, 'sasaran_kegiatan_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sasaranKegiatan) {
            $sasaranKegiatan->indikators()->delete();
        });
    }
}
