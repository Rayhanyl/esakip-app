<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranBupatiIndikator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function penanggung_jawab()
    {
        return $this->belongsTo(PenanggungJawab::class);
    }

    public function simple_actions()
    {
        return $this->hasMany(SimpleAction::class);
    }
}
