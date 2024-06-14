<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaKegiaIn extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_kegia_id',
        'satuan_id',
        'indikator',
        'target',
        'kegiatan',
        'anggaran',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perda_kegia()
    {
        return $this->belongsTo(PerdaKegia::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
