<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Validate inputs
        $validated_data = $request->validate([
            'first_name'        => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s\-]+$/'],
            'last_name'         => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s\-]+$/'],
            'gender'            => ['required', 'in:Male,Female,Others'],
            'birthday'          => ['required','date'],
            'monthly_salary'    => ['required', 'numeric', 'min:0'],
        ]);

        $employee = Employee::create([
            'first_name'        => $validated_data['first_name'],
            'last_name'         => $validated_data['last_name'],
            'gender'            => $validated_data['gender'],
            'birthday'          => $validated_data['birthday'],
            'monthly_salary'    => $validated_data['monthly_salary'],
        ]);

        return Redirect::route('employees.index')->with('status', 'New employee saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return redirect()->route('employees.edit', $employee->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {   
        // Validate the form input
        $validated = $request->validate([
            'first_name'      => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s\-]+$/'],
            'last_name'       => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s\-]+$/'],
            'gender'          => ['required', 'in:Male,Female,Others'],
            'birthday'        => ['required', 'date'],
            'monthly_salary'  => ['required', 'numeric', 'min:0'],
        ]);

        // Update employee with validated data
        $employee->update($validated);
        
        return back()->with('status', 'employee-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['status' => 'employee-deleted']);
    }

}
