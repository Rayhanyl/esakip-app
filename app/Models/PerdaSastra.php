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
}
