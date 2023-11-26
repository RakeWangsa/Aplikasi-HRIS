<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTimesheet extends Model
{
    use HasFactory;
    protected $table = "task_timesheet";
    public $timestamps = false;
    protected $fillable = [
        'jenis_task',
    ];
}
