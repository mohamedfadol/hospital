<?php

namespace App\Http\Controllers;

use App\Department;
use App\Hospital;
use Illuminate\Http\Request;

class forDepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        $hospital   = Hospital::first();
        return view('forentend.department.index')->with(['departments' => $departments,'hospital' => $hospital]);
    }

    public function show(Department $department)
    {
        $department = Department::findOrFail($department->id);
        $hospital   = Hospital::first();
        return view('forentend.department.show')->with(['department'=> $department,'hospital' => $hospital]);
    }

}
