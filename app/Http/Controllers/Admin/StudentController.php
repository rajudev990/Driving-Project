<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view student')->only('index');
        $this->middleware('permission:create student')->only(['create', 'store']);
        $this->middleware('permission:edit student')->only(['edit', 'update']);
        $this->middleware('permission:delete student')->only('destroy');
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::latest()->get();
        return view('admin.student.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string',
        ]);

        $data = $request->all();

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : '';
        $data['image'] = $image;

        Student::create($data);
        return redirect()->route('admin.students.index')->with('success', 'Data Create successfully.');
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
        $data = Student::findOrFail($id); 
        return view('admin.student.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string',
        ]);

        $data = Student::findOrFail($id); 

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : '';

         if($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
         }

        $input = $request->all();

        if($image){
            $input['image'] = $image;
        }

        $data->update($input);

        return redirect()->route('admin.students.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data = Student::findOrFail($id); 

         if($data->image){
             Storage::disk('public')->delete($data->image);
         }

         $data->delete();
         return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
