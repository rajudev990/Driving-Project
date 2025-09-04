<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view expense')->only('index');
        $this->middleware('permission:create expense')->only(['create', 'store']);
        $this->middleware('permission:edit expense')->only(['edit', 'update']);
        $this->middleware('permission:delete expense')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Expense::latest()->get();
        return view('admin.expense.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        Expense::create($data);
        return redirect()->route('admin.expense.index')->with('success', 'Data Create successfully.');
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
        $data = Expense::findOrFail($id); 
        return view('admin.expense.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        
        $data = Expense::findOrFail($id); 

        $input = $request->all();
        $data->update($input);

        return redirect()->route('admin.expense.index')->with('success', 'Data Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data = Expense::findOrFail($id); 
         $data->delete();
         return redirect()->back()->with('success', 'Data Delete successfully.');
    }
}
