<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view schedule')->only('index');
        $this->middleware('permission:create schedule')->only(['create', 'store']);
        $this->middleware('permission:edit schedule')->only(['edit', 'update']);
        $this->middleware('permission:delete schedule')->only('destroy');
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Schedule::latest()->get();
        return view('admin.schedule.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::where('status',1)->get();
        $teacher = Teacher::where('status',1)->get();
        return view('admin.schedule.create',compact('teacher','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Schedule::create($data);
        return redirect()->route('admin.schedule.index')->with('success', 'Data Create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Schedule::findOrFail($id); 
        $student = Student::where('status',1)->get();
        $teacher = Teacher::where('status',1)->get();
        return view('admin.schedule.edit',compact('data','student','teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Schedule::findOrFail($id); 

        $input = $request->all();
        $data->update($input);

        return redirect()->route('admin.schedule.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data = Schedule::findOrFail($id); 
         $data->delete();
         return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
