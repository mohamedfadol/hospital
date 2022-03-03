<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       // dd($request);
        $this->validate(request(), [

            'name'   => 'required',
            'about'  => 'required',
            'job'    => 'required',
            'image'  => 'required'
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


        $Comment = new Comment;
        $Comment->name   = $request->input('name') ;
        $Comment->about  = $request->input('about')  ;
        $Comment->job    = $request->input('job') ;
        $Comment->image  = $fileNameToStore;
        $Comment->save();

        return redirect()->back()->with(['success' => 'Inserted Has Been Done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
