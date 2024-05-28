<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanKinerjaStrategicTarget extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 'sasaran_bupati', 'pengampu'
    ];

    public function indicators()
    {
        return $this->hasMany(PerencanaanKinerjaStrategicTargetIndicator::class);
    }
}
