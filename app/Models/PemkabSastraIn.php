<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemkabSastraIn extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'pemkab_sastra_id',
        'satuan_id',
        'indikator',
        'target1',
        'target2',
        'target3',
        'tipe_perhitungan',
        'penjelasan',
        'sumber_data',
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

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function simple_actions()
    {
        return $this->hasMany(PemkabSimact::class);
    }

    public function penanggung_jawabs()
    {
        return $this->hasMany(PemkabPenja::class);
    }
}
