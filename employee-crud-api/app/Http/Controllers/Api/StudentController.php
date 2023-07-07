<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Student;

use Illuminate\Http\Request;
class StudentController extends Controller
{
   
    public function index()
    {
        $Students=Student::all();
        return [
            "status" => 1,
            "data" => $Students
        ];
    }

    
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'year' => 'required',
            'image' => 'required',
        ]);

        $Student = Student::create($request->all());
        
        return [
            "status" => 1,
            "data" => $Student
        ];
    }

    
    public function show(Student $Student)
    {
        return [
            "status" => 1,
            "data" =>$Student
        ];
    }

    public function update(Request $request, Student $Student)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'year' => 'required',
            'image' => 'required',
        ]);

        $Student->update($request->all());
        
        return [
            "status" => 1,
            "data" => $Student,
            "msg" => "Student updated successfully"
        ];
    }

    public function destroy(Student $Student)
    {
        $Student->delete();

        return [
            "status" => 1,
            "data" => $Student,
            "msg" => "Student deleted successfully"
        ];
    }
}
