<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaPelaporan extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'tahun',
        'file',
        'keterangan',
        'count',
    ];
    protected $fillable = self::FILLABLE_FIELDS;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
