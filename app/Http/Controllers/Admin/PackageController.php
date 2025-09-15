<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view package')->only('index');
        $this->middleware('permission:create package')->only(['create', 'store']);
        $this->middleware('permission:edit package')->only(['edit', 'update']);
        $this->middleware('permission:delete package')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Package::all();
        return view('admin.package.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|unique:packages,name',
        ]);


        $data = $request->all();
        Package::create($data);
        return redirect()->route('admin.packages.index')->with('success', 'Data Create successfully.');
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
        $data = Package::findOrFail($id);
        return view('admin.package.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = Package::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:packages,name,' . $data->id,
        ]);



        $input = $request->all();
        $data->update($input);

        return redirect()->route('admin.packages.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Package::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
