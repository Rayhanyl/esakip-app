<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerahPerencanaanKinerjaActivityTarget extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'perda_perencanaan_kinerja_activity_targets';

    public function indicators()
    {
        return $this->hasMany(PerangkatDaerahPerencanaanKinerjaActivityTargetIndicator::class, 'perda_perencanaan_kinerja_activity_target_id', 'id');
    }
}
