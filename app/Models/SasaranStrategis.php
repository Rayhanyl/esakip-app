<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranStrategis extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function indikators()
    {
        $this->hasMany(SasaranStrategisIndikator::class);
    }
}
