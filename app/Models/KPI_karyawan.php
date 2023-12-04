<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPI_karyawan extends Model
{
    use HasFactory;
    protected $table = "kpi_karyawan";
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_kpi_admin',
        'realisasi',
        'score',
        'nilai_akhir',
        'sumber',
    ];
}
