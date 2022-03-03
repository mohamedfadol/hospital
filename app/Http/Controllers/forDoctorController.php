<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Department;
use App\Hospital;

class forDoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $hospital   = Hospital::first();
        return view('forentend.doctor.index')->with(['doctors' => $doctors,'hospital' => $hospital]);
    }
}
