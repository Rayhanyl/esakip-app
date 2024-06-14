<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    const FILLABLE_FIELDS = [
        'satuan',
    ];
    protected $fillable = self::FILLABLE_FIELDS;
}
