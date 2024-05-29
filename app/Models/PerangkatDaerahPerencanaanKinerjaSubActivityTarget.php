<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerahPerencanaanKinerjaSubActivityTarget extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'perda_perencanaan_kinerja_sub_activity_targets';

    public function indicators()
    {
        return $this->hasMany(PerangkatDaerahPerencanaanKinerjaSubActivityTargetIndicator::class, 'perda_perencanaan_kinerja_sub_activity_target_id', 'id');
    }
}
