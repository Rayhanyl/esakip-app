<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaPengSubTahun extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_pengukuran_id',
        'perda_sastra_id',
        'perda_sastra_in_id',
        'target',
        'realisasi',
        'karakteristik',
        'capaian',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
}
