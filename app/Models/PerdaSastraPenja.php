<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaSastraPenja extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'perda_sastra_in_id',
        'penanggung_jawab',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function perda_sastra_in()
    {
        return $this->belongsTo(PerdaSastraIn::class);
    }
}
