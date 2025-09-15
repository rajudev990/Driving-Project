<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view teacher')->only('index');
        $this->middleware('permission:create teacher')->only(['create', 'store']);
        $this->middleware('permission:edit teacher')->only(['edit', 'update']);
        $this->middleware('permission:delete teacher')->only('destroy');
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::latest()->get();
        return view('admin.teacher.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
                'email' => 'required|unique:teachers,email',
                'phone' => 'required|unique:teachers,phone',
            ]);

        $data = $request->all();

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : '';
        $data['image'] = $image;

        Teacher::create($data);
        return redirect()->route('admin.teachers.index')->with('success', 'Data Create successfully.');
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
        $data = Teacher::findOrFail($id); 
        return view('admin.teacher.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Teacher::findOrFail($id); 
        $request->validate([
                'email' => 'required|unique:teachers,email' .$data->id,
                'phone' => 'required|unique:teachers,phone'.$data->id,
            ]);
        
        

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : '';

         if($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
         }

        $input = $request->all();

        if($image){
            $input['image'] = $image;
        }

        $data->update($input);

        return redirect()->route('admin.teachers.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data = Teacher::findOrFail($id); 

         if($data->image){
             Storage::disk('public')->delete($data->image);
         }

         $data->delete();
         return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
