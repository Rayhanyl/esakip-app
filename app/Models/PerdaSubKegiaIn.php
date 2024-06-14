<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaSubKegiaIn extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_subkegia_id',
        'satuan_id',
        'indikator',
        'target',
        'triwulan1',
        'triwulan2',
        'triwulan3',
        'triwulan4',
        'subkegiatan',
        'anggaran',
    ];
    protected $fillable = self::FILLABLE_FIELDS;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function perda_subkegia()
    {
        return $this->belongsTo(PerdaSubKegia::class);
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
