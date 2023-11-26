<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'absensi',
        'date',
        'time',
        'keterangan',
        'file',
    ];
}
