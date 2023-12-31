<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;
    protected $table = "timesheet";
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'task',
        'category',
        'date',
        'start_time',
        'end_time',
    ];
}
