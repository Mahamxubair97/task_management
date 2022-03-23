<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Timezone;
use Illuminate\Support\Facades\Log;
class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::all(); 
        return view('tasks.index')->with('users',$users);
    }
    /**
     * Display all tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function data($region,$city)
    {
        Log::info($region);
        Log::info($city);
        Log::info(date_default_timezone_get() . ' => ' . date('e') . ' => ' . date('T'));
        if(is_null($region) || is_null($city)){
            $region = 'Asia';
            $city = 'Karachi';
        }
        $tasks = Task::all();
        foreach($tasks as $task){
            $date  = Carbon::parse($task->deadline); 
            $date = Timezone::convertToLocal($date);
            $task->deadline = $date;
            Log::info($date);
        }
        return DataTables::of($tasks)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set($request->timezone); //Changing the timze according to Local Time
        //creating new task
        $task = new Task();
        $task->name = $request->name;
        $task->deadline = Carbon::parse($request->deadline);
        $task->user_id = $request->user;
        $task->save();
        
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
