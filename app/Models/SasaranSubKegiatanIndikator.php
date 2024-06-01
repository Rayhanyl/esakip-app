<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranSubKegiatanIndikator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sasaran_sub_kegiatan()
    {
        return $this->belongsTo(SasaranSubKegiatan::class);
    }
}
