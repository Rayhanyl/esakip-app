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
        $this->belongsTo(User::class);
    }

    public function pengampu()
    {
        $this->belongsTo(User::class, 'id', 'pengampu_id');
    }

    public function indicators()
    {
        $this->belongsTo(SasaranBupatiIndikator::class);
    }
}
