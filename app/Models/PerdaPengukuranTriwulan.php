<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaPengukuranTriwulan extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_pengukuran_id',
        'perda_sastra_id',
        'perda_sastra_in_id',
        'perda_sub_kegia_id',
        'perda_sub_kegia_in_id',
        'perda_sub_kegia_target',
        'realisasi',
        'karakteristik',
        'capaian',
        'anggaran_perda_sub_kegia_id',
        'anggaran_perda_sub_kegia_pagu',
        'anggaran_perda_sub_kegia_realisasi',
        'anggaran_perda_sub_kegia_capaian',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function perda_pengukuran()
    {
        return $this->belongsTo(PerdaPengukuran::class);
    }

    public function perda_sastra()
    {
        return $this->belongsTo(PerdaSastra::class);
    }

    public function perda_sastra_in()
    {
        return $this->belongsTo(PerdaSastraIn::class);
    }

    public function perda_sub_kegia()
    {
        return $this->belongsTo(PerdaSubKegia::class);
    }

    public function perda_sub_kegia_in()
    {
        return $this->belongsTo(PerdaSubKegiaIn::class);
    }
}
