<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskTimesheet;
use Illuminate\Support\Facades\DB;

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
        $task = DB::table('task_timesheet')
        ->select('*')
        ->get();
        return view('timesheet.admin', [
            'title' => 'Task Timesheet',
            'active' => 'task_timesheet',
            'task' => $task
        ]);
    }

    public function addTask(Request $request)
    {
        $task = $request->task;
        TaskTimesheet::create([
            'jenis_task' => $task,
        ]);
        return redirect('/admin/task-timesheet');  
    }
}
