<?php

namespace App\Http\Controllers;

use App\Department;
use App\Customr;
use App\Comment;
use Illuminate\Http\Request;
use Alert;

class DepartmentController extends Controller
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
        $departments = Department::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('department.index')
                ->with(['departments' => $departments, 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('department.create')
                ->with([ 'count'=>$count ,'comments'=>$comments]);
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

            'name'        => 'required',
            'about'       => 'required',
            'labtest'     => 'required',
            'primaryCare' => 'required',
            'systCheck'   => 'required',
            'heartRat'    => 'required',
            'image'       => 'required'
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


        $department = new Department;
        $department->name        = $request->input('name') ;
        $department->about       = $request->input('about')  ;
        $department->labtest     = $request->input('labtest') ;
        $department->primaryCare = $request->input('primaryCare')  ;
        $department->systCheck   = $request->input('systCheck')  ;
        $department->heartRat    = $request->input('heartRat')  ;
        $department->image       = $fileNameToStore;
        $department->save();

        return redirect()->route('department.home')->withSuccessMessage('Inserted Has Been Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department = Department::findOrFail($department->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('department.show')->with(['department'=> $department,
                 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $department = Department::findOrFail($department->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('department.edit')->with(['department'=> $department,
                 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
       // dd($request);
        $this->validate(request(), [

            'name'        => 'required',
            'about'       => 'required',
            'labtest'     => 'required',
            'primaryCare' => 'required',
            'systCheck'   => 'required',
            'heartRat'    => 'required',
            'image'       => 'required'
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


        $department = Department::findOrFail($department->id);
        $department->name        = $request->input('name') ;
        $department->about       = $request->input('about')  ;
        $department->labtest     = $request->input('labtest') ;
        $department->primaryCare = $request->input('primaryCare')  ;
        $department->systCheck   = $request->input('systCheck')  ;
        $department->heartRat    = $request->input('heartRat')  ;
        $department->image       = $fileNameToStore;
        $department->save();

        return redirect()->route('department.home')->withSuccessMessage('Inserted Has Been Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department = Department::findOrFail($department->id);
        $doctors = Doctor::where('department_id' , $department->id)->get();
        foreach ($doctors as $doctor)
            if ($doctor->department_id == $department->id) 
                return redirect()->back()->withSuccessMessage('Can Not Delete It  Has Related']);   
        $department->delete();
        return redirect()->back()->withSuccessMessage('Deleted Has Been Done');
    }
}
