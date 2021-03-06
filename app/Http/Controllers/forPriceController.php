<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;
use App\Hospital;
use App\Department;
use App\Comment;
use App\Blog;
use App\Customr;
use App\Doctor;
use DB;
use App\Mail\ReservingMail;
use Illuminate\Support\Facades\Mail; 

class forPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::first()->take(5)->get();
        // DB::table('users')->skip(10)->take(5)->get();
        $hospital = Hospital::first();
        $department = Department::first();
        $Comments = Comment::all();
        return view('forentend.price.index')
                ->with(['hospital' => $hospital , 
                        'department' => $department , 
                        'prices' => $prices , 
                        'Comments' => $Comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
