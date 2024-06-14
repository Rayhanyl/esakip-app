<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaProgIn extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_prog_id',
        'satuan_id',
        'indikator',
        'target',
        'program',
        'anggaran',
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

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
