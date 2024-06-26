<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaSubKegia extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_kegia_id',
        'sasaran',
        'tahun',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function perda_subkegia_ins(){
        return $this->hasMany(PerdaSubKegiaIn::class, 'perda_subkegia_id', 'id');
    }
    public function perda_subkegia_pengampus(){
        return $this->hasMany(PerdaSubKegiaPengampu::class, 'perda_subkegia_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perda_kegia()
    {
        return $this->belongsTo(PerdaKegia::class);
    }
}
