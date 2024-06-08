<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranProgram extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indikators()
    {
        return $this->hasMany(SasaranProgramIndikator::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sasaranProgram) {
            $sasaranProgram->indikators()->delete();
        });
    }
}
