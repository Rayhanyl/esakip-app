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
        return $this->belongsTo(User::class);
    }

    public function indikators()
    {
        return $this->hasMany(SasaranStrategisIndikator::class);
    }

    public function sasaran_program()
    {
        return $this->belongsTo(SasaranProgram::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sasaranStrategis) {
            $sasaranStrategis->indikators()->delete();
        });
    }
}
