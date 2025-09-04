<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view attendance')->only('index');
        $this->middleware('permission:create attendance')->only(['create', 'store']);
        $this->middleware('permission:edit attendance')->only(['edit', 'update']);
        $this->middleware('permission:delete attendance')->only('destroy');
    }

    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = Attendance::first();
         $student = Student::where('status',1)->get();
        $admission = Admission::where('status',1)->get(); 
        return view('admin.attendance.index',compact('data','student','admission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Attendance::findOrFail($id); 

        $input = $request->all();
        $data->update($input);

        return redirect()->back()->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
