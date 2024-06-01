<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemkabPengukuranKinerja extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function bupati()
    {
        $this->belongsTo(SasaranBupati::class);
    }

    public function bupati_indikator()
    {
        $this->belongsTo(SasaranBupatiIndikator::class);
    }
}
