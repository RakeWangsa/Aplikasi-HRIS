<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OKR extends Model
{
    use HasFactory;
    protected $table = "okr";
    public $timestamps = false;
    protected $fillable = [
        'jenis',
        'parent',
        'indikator',
        'level',
        'status',
    ];
}
