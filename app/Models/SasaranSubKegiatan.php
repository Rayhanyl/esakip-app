<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranSubKegiatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indikators()
    {
        return $this->hasMany(SasaranSubKegiatanIndikator::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sasaranSubKegiatan) {
            $sasaranSubKegiatan->indikators()->delete();
        });
    }
}
