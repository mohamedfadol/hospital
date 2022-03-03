<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Customr;
use App\Comment;
use Illuminate\Http\Request;
use Auth;
use Alert;



class HospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $hospital = Hospital::first();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('hospital.index')->with(['hospital' => $hospital, 'count'=>$count ,'comments'=>$comments]);
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
        return view('hospital.create')->with(['count'=>$count ,'comments'=>$comments]);
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

            'name'    => 'required',
            'address' => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'about'   => 'required'
        ]);

        $hospital = new Hospital;
        $hospital->name     = $request->input('name') ;
        $hospital->address  = $request->input('address') ;
        $hospital->email    = $request->input('email')  ;
        $hospital->phone    = $request->input('phone')  ;
        $hospital->about    = $request->input('about')  ;
        $hospital->save();

        return redirect()->route('hospital.home')->withSuccessMessage('Your Request Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        $hospital = Hospital::findOrFail($hospital->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('hospital.show')->with(['hospital' => $hospital,
             'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $hospital = Hospital::findOrFail($hospital->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('hospital.edit')->with(['hospital' => $hospital, 
                'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
       // dd($request);
        $this->validate(request(), [

            'name'    => 'required',
            'address' => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'about'   => 'required'
        ]);

        $hospital = Hospital::findOrFail($hospital->id);
        $hospital->name     = $request->input('name') ;
        $hospital->address  = $request->input('address') ;
        $hospital->email    = $request->input('email')  ;
        $hospital->phone    = $request->input('phone')  ;
        $hospital->about    = $request->input('about')  ;
        $hospital->save();
        // Alert::success('Success Title', 'Success Message');

        return redirect()->route('hospital.home')->withSuccessMessage('Your Request Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital = Hospital::findOrFail($hospital->id);
        $hospital->delete();
        return redirect()->back()->withSuccessMessage('Your Request Deleted Was Done');
    }
}
