<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Department;
use App\Customr;
use App\Comment;
use Illuminate\Http\Request;
use Alert;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin','auth']);

        $this->middleware(function($request , $next){
            if (session('success_message')) {
                Alert::success('Successfully !',session('success_message'));
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('doctor.index')
                ->with(['doctors' => $doctors, 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $departments = Department::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('doctor.create')
            ->with(['departments' => $departments, 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate(request(), [

            'name'          => 'required',
            'about'         => 'required',
            'department_id' => 'required',
            'image'         => 'required'
        ]);

        if ($request->hasFile('image')) {

            // Get File Name With Extenison
            $fileNameWithEex = $request->file('image')->getClientOriginalName();

            // Get fileName Only
            $fileName = pathinfo($fileNameWithEex , PATHINFO_FILENAME);

            // Get FileExtenison
            $extension = $request->file('image')->getClientOriginalExtension();

            // fileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('image')->storeAs('public/cover_images' , $fileNameToStore);
            
        }else{

            $fileNameToStore = 'No Images To Store In .jpg';
        }


        $doctor = new Doctor;
        $doctor->name          = $request->input('name') ;
        $doctor->image         = $fileNameToStore;
        $doctor->about         = $request->input('about')  ;
        $doctor->department_id = $request->input('department_id') ;
        $doctor->save();

        return redirect()->route('doctor.home')->withSuccessMessage('Inserted Has Been Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $doctor = Doctor::findOrFail($doctor->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('doctor.show')->with(['doctor'=> $doctor, 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $doctor = Doctor::findOrFail($doctor->id);
        $departments = Department::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('doctor.edit')
            ->with(['doctor'=> $doctor , 'departments' => $departments,
             'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
       // dd($request);
        $this->validate(request(), [

            'name'          => 'required',
            'about'         => 'required',
            'department_id' => 'required',
            'image'         => 'required'
        ]);

        if ($request->hasFile('image')) {

            // Get File Name With Extenison
            $fileNameWithEex = $request->file('image')->getClientOriginalName();

            // Get fileName Only
            $fileName = pathinfo($fileNameWithEex , PATHINFO_FILENAME);

            // Get FileExtenison
            $extension = $request->file('image')->getClientOriginalExtension();

            // fileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('image')->storeAs('public/cover_images' , $fileNameToStore);
            
        }else{

            $fileNameToStore = 'No Images To Store In .jpg';
        }

        $doctor = Doctor::findOrFail($doctor->id);
        $doctor->name          = $request->input('name') ;
        $doctor->image         = $fileNameToStore;
        $doctor->about         = $request->input('about')  ;
        $doctor->department_id = $request->input('department_id') ;
        $doctor->save();

        return redirect()->route('doctor.home')->withSuccessMessage('Inserted Has Been Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor = Doctor::findOrFail($doctor->id);
        $doctor->delete();
        return redirect()->route('doctor.home')->withSuccessMessage('Deleted Has Been Done');

    }
}
