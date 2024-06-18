<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaPengukuranTahunan extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'perda_sastra_id',
        'perda_sastra_in_id',
        'tahunan_target',
        'tahunan_realisasi',
        'tahunan_karakteristik',
        'tahunan_capaian',
    ];
    protected $fillable = self::FILLABLE_FIELDS;
}
