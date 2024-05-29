<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerahPerencanaanKinerjaProgramTarget extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'perda_perencanaan_kinerja_program_targets';

    public function indicators()
    {
        return $this->hasMany(PerangkatDaerahPerencanaanKinerjaProgramTargetIndicator::class, 'perda_perencanaan_kinerja_program_target_id', 'id');
    }
}
