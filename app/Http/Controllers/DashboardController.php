<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $maleCount = Employee::where('gender', 'Male')->count();
        $femaleCount = Employee::where('gender', 'Female')->count();
        $averageAge = Employee::selectRaw('AVG(TIMESTAMPDIFF(YEAR, birthday, CURDATE())) as avg_age')->value('avg_age'); 
        $totalSalary = Employee::sum('monthly_salary'); // Compute total salary
        $employees = Employee::all();
        $averageSalary = $employees->avg('monthly_salary'); // Compute average salary

        return view('dashboard', compact(
            'maleCount', 
            'femaleCount', 
            'averageAge', 
            'totalSalary',
            'averageSalary',
            'employees'));
    }
}
