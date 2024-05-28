<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanKinerjaStrategicTargetIndicator extends Model
{
    use HasFactory;
    protected $fillable = [
        'perencanaan_kinerja_strategic_target_id', 'indikator', 'target1', 'target2', 'target3', 'satuan', 'penjelasan', 'tipe_perhitungan', 'sumber_data', 'penanggung_jawab', 'simple_action'
    ];
}
