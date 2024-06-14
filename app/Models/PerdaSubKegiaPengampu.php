<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaSubKegiaPengampu extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'perda_subkegia_id',
        'pengampu_id',
    ];
    protected $fillable = self::FILLABLE_FIELDS;
    
    public function perda_subkegia()
    {
        return $this->belongsTo(PerdaSubKegia::class);
    }
}
