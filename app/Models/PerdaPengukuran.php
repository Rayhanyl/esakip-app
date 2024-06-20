<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerdaPengukuran extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'user_id',
        'tahun',
    ];
    protected $fillable = self::FILLABLE_FIELDS;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tahunans()
    {
        return $this->hasMany(PerdaPengukuranTahunan::class);
    }

    public function triwulans()
    {
        return $this->hasMany(PerdaPengukuranTriwulan::class);
    }
}
