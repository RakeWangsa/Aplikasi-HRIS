<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function timesheet_karyawan()
    {
        return view('timesheet.karyawan', [
            'title' => 'Timesheet',
            'active' => 'timesheet_karyawan',
        ]);
    }

    public function timesheet_executive()
    {
        return view('timesheet.executive', [
            'title' => 'Timesheet',
            'active' => 'timesheet_executive',
        ]);
    }

    public function task_timesheet()
    {
        return view('timesheet.admin', [
            'title' => 'Task Timesheet',
            'active' => 'task_timesheet',
        ]);
    }
}
