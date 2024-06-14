<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemkabSimact extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'pemkab_sastra_in_id',
        'action',
    ];
    protected $fillable = self::FILLABLE_FIELDS;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemkab_sastra_in()
    {
        return $this->belongsTo(PemkabSastraIn::class);
    }
}
