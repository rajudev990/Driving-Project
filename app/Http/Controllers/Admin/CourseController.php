<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\CourseComplete;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view course')->only('index');
        $this->middleware('permission:create course')->only(['create', 'store']);
        $this->middleware('permission:edit course')->only(['edit', 'update']);
        $this->middleware('permission:delete course')->only('destroy');
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CourseComplete::latest()->get();
        return view('admin.course-complete.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $student = Student::where('status',1)->get();
        $admission = Admission::where('status',1)->get();
        return view('admin.course-complete.create',compact('admission','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        CourseComplete::create($data);
        return redirect()->route('admin.course-complete.index')->with('success', 'Data Create successfully.');
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
        $data = CourseComplete::findOrFail($id); 
        $student = Student::where('status',1)->get();
        $admission = Admission::where('status',1)->get();
        return view('admin.course-complete.edit',compact('data','student','admission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = CourseComplete::findOrFail($id); 

        $input = $request->all();
        $data->update($input);

        return redirect()->route('admin.course-complete.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data = CourseComplete::findOrFail($id); 
         $data->delete();
         return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
