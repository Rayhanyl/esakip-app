<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SasaranBupatiIndikator;

class PemkabPengukuranKinerja extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sasaran_bupati()
    {
        return $this->belongsTo(SasaranBupati::class);
    }

    public function sasaran_bupati_indikator()
    {
        return $this->belongsTo(SasaranBupatiIndikator::class);
    }
}
