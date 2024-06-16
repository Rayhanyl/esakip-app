<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaProg extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'perda_sastra_id',
        'pengampu_id',
        'sasaran',
        'tahun',
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

        public function perda_prog_ins()
    {
        return $this->hasMany(PerdaProgIn::class);
    }

}
