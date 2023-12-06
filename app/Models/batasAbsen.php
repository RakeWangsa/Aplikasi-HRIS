<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batasAbsen extends Model
{
    use HasFactory;
    protected $table = "batas_absen";
    public $timestamps = false;
    protected $fillable = [
        'batas_awal_datang',
        'batas_akhir_datang',
        'batas_awal_pulang',
        'batas_akhir_pulang',
    ];
}
