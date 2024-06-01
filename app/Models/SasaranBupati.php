<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranBupati extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengampu()
    {
        return $this->belongsTo(User::class, 'id', 'pengampu_id');
    }

    public function indicators()
    {
        return $this->belongsTo(SasaranBupatiIndikator::class);
    }
}
