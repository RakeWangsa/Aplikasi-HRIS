<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPI_admin extends Model
{
    use HasFactory;
    protected $table = "kpi_admin";
    public $timestamps = false;
    protected $fillable = [
        'divisi',
        'tanggung_jawab_pekerjaan',
        'key_performance_indikator',
        'bobot',
        'target',
    ];
}
