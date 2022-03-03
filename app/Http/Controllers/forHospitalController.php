<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Department;
use App\Comment;
use App\Blog;
use App\Customr;
use App\Doctor;
use App\Mail\ReservingMail;
use Illuminate\Support\Facades\Mail;
use Alert;

class forHospitalController extends Controller
{
 


    public function index()
    { 
        $hospital = Hospital::first();
        $department = Department::first();
        $Comments = Comment::all();
        return view('forentend.hospital.index')
        		->with(['hospital' => $hospital , 
        				'department' => $department , 
        				'Comments' => $Comments]);
    }


    public function home()
    {
        $hospital 	= Hospital::first();
        $department = Department::first();
        $departments = Department::all();
        $doctotsle   = Doctor::all();
        $doctors 	= Doctor::all()->take(4);
        $blogs 		= Blog::all()->take(4);
        $comments 	= Comment::all();
    	return view('welcome')
    			->with(['hospital' => $hospital , 
    					'department' => $department , 
    					'comments' => $comments , 'doctors' => $doctors ,
                         'blogs' => $blogs,'departments' => $departments ,'doctotsle' => $doctotsle ]);
    }



    public function makePoint()
    {
        $hospital   = Hospital::first();
        $doctotsle  = Doctor::all();
        $departments = Department::all();
        $doctors    = Doctor::all()->take(4);
        return view('forentend.makePoint.create')
                ->with(['departments' => $departments,
                        'doctotsle' => $doctotsle,'hospital' => $hospital,'doctors' => $doctors]);
    }


    public function store(Request $request)
    {
       // dd($request);
        $this->validate(request(), [

            'name'          => 'required',
            'name2'         => 'required',
            'about'         => 'required',
            'phone'         => 'required',
            'email'         => 'required',
            'attend'        => 'required',
            'time'          => 'required',
            'department_id' => 'required',
            'doctor_id'     => 'required',
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


        $customer = new Customr;
        $customer->name          = $request->input('name') ;
        $customer->name2         = $request->input('name2')  ;
        $customer->about         = $request->input('about')  ;
        $customer->phone         = $request->input('phone')  ;
        $customer->email         = $request->input('email')  ;
        $customer->attend        = $request->input('attend')  ;
        $customer->time          = $request->input('time')  ;
        $customer->department_id = $request->input('department_id') ;
        $customer->doctor_id     = $request->input('doctor_id')  ;
        $customer->image         = $fileNameToStore;
        $customer->save();



        // Test database connection
        try {
            DB::connection()->getPdo();
            Mail::to($request['email'])->send(new ReservingMail($customer));
            return redirect()->route('forent.hospital.home')->with(['success' => 'Inserted Has Been Done We Will Inform You With Your E-mail']);

        } catch (\Exception $e) {
            return redirect()->route('forent.hospital.home')
                                 ->with(['error' => 'Inserted Has Been Do Not Completed Try Again']); 
        }

    }
    
}
