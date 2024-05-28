<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengukuranKinerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'perencanaan_kinerja_strategic_target_id', 'sasaran_bupati', 'pengampu'
    ];
}
