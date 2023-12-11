<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskTimesheet;
use App\Models\Timesheet;
use Illuminate\Support\Facades\DB;

class TimesheetController extends Controller
{
    public function timesheet_karyawan()
    {
        $task = DB::table('task_timesheet')
        ->where('divisi', auth()->user()->job)
        ->select('*')
        ->get();

        $email = session('email');
        $id_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('id')
        ->first();
        $timesheet = DB::table('timesheet')
        ->where('id_user',$id_user)
        ->select('*')
        ->get();
        return view('timesheet.karyawan', [
            'title' => 'Timesheet',
            'active' => 'timesheet_karyawan',
            'task' => $task,
            'timesheet' => $timesheet
        ]);
    }
    public function submitTimesheet(Request $request)
    {
        $task = $request->task;
        $category = $request->category;
        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        $email = session('email');
        $id_user = DB::table('Users')
        ->where('email', $email)
        ->pluck('id')
        ->first();

        Timesheet::create([
            'id_user' => $id_user,
            'task' => $task,
            'category' => $category,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);


        return redirect('/timesheet/time-tracker');  
    }

    public function timesheet_executive()
    {
        $timesheet = DB::table('timesheet')
        ->select('timesheet.*', 'users.name', 'users.job')
        ->join('users', 'timesheet.id_user', '=', 'users.id')
        ->get();    
        $employee = DB::table('Users')
        ->where('level','karyawan')
        ->select('name')
        ->get();
        $job = DB::table('Users')
        ->where('level','karyawan')
        ->select('job')
        ->distinct()
        ->get();
        return view('timesheet.executive', [
            'title' => 'Timesheet',
            'active' => 'timesheet_executive',
            'timesheet' => $timesheet,
            'employee' => $employee,
            'job' => $job,
        ]);
    }

    public function filterTimesheet(Request $request)
    {
        $groupBy=$request->groupBy;
        $filter=$request->filter;
        $startDate=$request->start_date;
        $endDate=$request->end_date;
        
        if($groupBy=="job"){
            $timesheet = DB::table('timesheet')     
            ->whereBetween('date', [$startDate, $endDate])
            ->select('timesheet.*', 'users.name', 'users.job')
            ->join('users', 'timesheet.id_user', '=', 'users.id')
            ->where('users.job', '=', $filter)
            ->get();  
        }else{
            $timesheet = DB::table('timesheet')     
            ->whereBetween('date', [$startDate, $endDate])
            ->select('timesheet.*', 'users.name', 'users.job')
            ->join('users', 'timesheet.id_user', '=', 'users.id')
            ->where('users.name', '=', $filter)
            ->get(); 
        }

  
        $employee = DB::table('Users')
        ->where('level','karyawan')
        ->select('name')
        ->get();
        $job = DB::table('Users')
        ->where('level','karyawan')
        ->select('job')
        ->distinct()
        ->get();
        return view('timesheet.executive', [
            'title' => 'Timesheet',
            'active' => 'timesheet_executive',
            'timesheet' => $timesheet,
            'employee' => $employee,
            'job' => $job,
            'groupBy' => $groupBy,
            'filter' => $filter,
            'startDate' => $startDate,
            'endDate' => $endDate,
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
        $divisi = $request->divisi;
        TaskTimesheet::create([
            'divisi' => $divisi,
            'jenis_task' => $task,
        ]);
        return redirect('/admin/task-timesheet');  
    }

    public function deleteTask($id)
    {
        $decryptedId = decrypt($id);
        TaskTimesheet::where('id', $decryptedId)->delete();
        return redirect('/admin/task-timesheet');  
    }
}
