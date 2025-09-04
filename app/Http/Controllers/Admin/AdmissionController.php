<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Package;
use App\Models\Student;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view admission')->only('index');
        $this->middleware('permission:create admission')->only(['create', 'store']);
        $this->middleware('permission:edit admission')->only(['edit', 'update']);
        $this->middleware('permission:delete admission')->only('destroy');
    }

    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = Admission::latest()->get();
        return view('admin.admission.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::where('status',1)->get();
        $package = Package::where('status',1)->get();
        return view('admin.admission.create',compact('student','package'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Admission::create($data);
        return redirect()->route('admin.admissions.index')->with('success', 'Data Create successfully.');
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
        $data = Admission::findOrFail($id); 
        $student = Student::where('status',1)->get();
        $package = Package::where('status',1)->get();
        return view('admin.admission.edit',compact('data','student','package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Admission::findOrFail($id); 
        

        $input = $request->all();
        $data->update($input);

        return redirect()->route('admin.admissions.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data = Admission::findOrFail($id); 
         $data->delete();
         return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
