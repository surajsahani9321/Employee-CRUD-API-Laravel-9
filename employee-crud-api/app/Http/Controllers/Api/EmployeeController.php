<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Employee;

use Illuminate\Http\Request;
class EmployeeController extends Controller
{
   
    public function index()
    {
        $employees=Employee::all();
        return [
            "status" => 1,
            "data" => $employees
        ];
    }

    
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'role' => 'required',
            'image' => 'required',
        ]);

        $employee = Employee::create($request->all());
        
        return [
            "status" => 1,
            "data" => $employee
        ];
    }

    
    public function show(Employee $employee)
    {
        return [
            "status" => 1,
            "data" =>$employee
        ];
    }

    public function update(Request $request, Employee $employee)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'role' => 'required',
            'image' => 'required',
        ]);

        $employee->update($request->all());
        
        return [
            "status" => 1,
            "data" => $employee,
            "msg" => "Employee updated successfully"
        ];
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return [
            "status" => 1,
            "data" => $employee,
            "msg" => "Employee deleted successfully"
        ];
    }
}
