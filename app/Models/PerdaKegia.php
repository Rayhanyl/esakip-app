<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaKegia extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_prog_id',
        'pengampu_id',
        'sasaran',
        'tahun',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function perda_prog()
    {
        return $this->belongsTo(PerdaProg::class);
    }

    public function perda_kegia_ins()
    {
        return $this->hasMany(PerdaKegiaIn::class);
    }

    public function perda_sub_kegias()
    {
        return $this->hasMany(PerdaSubKegia::class, 'perda_kegia_id', 'id');
    }
}
