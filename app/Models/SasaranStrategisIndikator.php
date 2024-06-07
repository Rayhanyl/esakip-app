<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranStrategisIndikator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sasaran_strategis()
    {
        return $this->belongsTo(SasaranStrategis::class);
    }

    public function sasaran_penanggung_jawabs()
    {
        return $this->hasMany(SasaranPenanggungJawab::class, 'sasaran_id', 'id');
    }
}
