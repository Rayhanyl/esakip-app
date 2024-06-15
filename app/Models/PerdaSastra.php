<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaSastra extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'pemkab_sastra_id',
        'pengampu_id',
        'sasaran',
        'tahun',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemkab_sastra()
    {
        return $this->belongsTo(PemkabSastra::class);
    }

    public function perda_sastra_ins()
    {
        return $this->hasMany(PerdaSastraIn::class);
    }

    public function perda_progs()
    {
        return $this->hasMany(PerdaProg::class, 'perda_sastra_id', 'id');
    }

    public function perda_prog_ins()
    {
        return $this->hasMany(PerdaProgIn::class, 'id', 'perda_prog_id');
    }

    public function perda_kegias()
    {
        return $this->belongsTo(PerdaKegia::class, 'id', 'perda_prog_id');
    }

    public function perda_kegia_ins()
    {
        return $this->hasMany(PerdaKegiaIn::class, 'id', 'perda_kegia_id');
    }

    public function perda_subkegias()
    {
        return $this->belongsTo(PerdaSubKegia::class, 'id', 'perda_kegia_id');
    }

    public function perda_subkegia_ins()
    {
        return $this->hasMany(PerdaSubKegiaIn::class, 'id', 'perda_subkegia_id');
    }
}
