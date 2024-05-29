<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerahPerencanaanKinerjaStrategicTarget extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function indicators()
    {
        return $this->hasMany(PerangkatDaerahPerencanaanKinerjaStrategicTargetIndicator::class);
    }
}
