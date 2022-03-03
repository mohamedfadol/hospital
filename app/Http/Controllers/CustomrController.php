<?php

namespace App\Http\Controllers;

use App\Customr;
use App\Comment;
use App\Department;
use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Database\Connection;
use DB;
use Illuminate\Support\Str;
use App\Mail\ReservingMail;
use App\Mail\ConfirmeMail;
use Illuminate\Support\Facades\Mail;
use Alert;

class CustomrController extends Controller
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
        $customrs = Customr::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('customer.index')
                ->with(['customrs' => $customrs , 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('customer.create')
                ->with(['departments' => $departments,
                        'doctors' => $doctors, 'count'=>$count ,'comments'=>$comments]);
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
        $customer->status        = 0;

        $customer->department_id = $request->input('department_id') ;
        $customer->doctor_id     = $request->input('doctor_id')  ;
        $customer->image         = $fileNameToStore;
        $customer->save(); 
        
        // Test database connection
        try {
            DB::connection()->getPdo();
            Mail::to($request['email'])->send(new ReservingMail($customer));

            return redirect()->route('forent.hospital.home')->withSuccessMessage('Inserted Has Been Done We Will Inform You With Your E-mail');

        } catch (\Exception $e) {
            return redirect()->route('forent.hospital.home')
                                 ->withSuccessMessage('Inserted Has Been Do Not Completed Try Again'); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customr  $customr
     * @return \Illuminate\Http\Response
     */
    public function show(Customr $customr)
    {
        $customr = Customr::findOrFail($customr->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('customer.show')->with(['customr' =>$customr, 
                'count'=>$count ,'comments'=>$comments]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customr  $customr
     * @return \Illuminate\Http\Response
     */
    public function edit(Customr $customr)
    {
        $customr = Customr::findOrFail($customr->id);
        $doctors = Doctor::all();
        $departments = Department::all();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('customer.edit')
                ->with(['customr' =>$customr ,'departments' => $departments,
                    'doctors' => $doctors, 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customr  $customr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customr $customr)
    {
        $customr = Customr::findOrFail($customr->id);
        $customr->name          = $request->input('name') ;
        $customr->email         = $request->input('email')  ;
        $customr->attend        = $request->input('attend')  ;
        $customr->time          = $request->input('time')  ;
        $customr->status        = 1;
        $customr->save();

        Mail::to($request['email'])->send(new ConfirmeMail($customr));
        return redirect()->route('customer.home')->withSuccessMessage('Updated Has Been Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customr  $customr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customr $customr)
    {
         $customer = Customr::findOrFail($customr->id);
        if (isset($customer)) {
             Alert::question('Sure To Deleting !','question_message');
            
        }
        // $customer->delete();
        // return redirect()->route('customer.home')->withSuccessMessage('Deleted Has Been Done');
    }
}
