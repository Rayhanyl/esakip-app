<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaSastraIn extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_sastra_id',
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

    public function perda_sastra()
    {
        return $this->belongsTo(PerdaSastra::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function perda_sastra_penja()
    {
        return $this->hasMany(PerdaSastraPenja::class);
    }
}
