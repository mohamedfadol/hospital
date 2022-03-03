<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\Customr;
use Illuminate\Http\Request;
use Alert;

class BlogController extends Controller
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
        $news = Blog::all();
        $comments = Comment::all();
        $count = Customr::where('status' , 0)->get();
        return view('blog.index')->with(['news' => $news , 'comments'=> $comments ,'count'=>$count]);
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
        return view('blog.create')->with(['comments'=> $comments ,'count'=>$count]);
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


        $blog = new Blog;
        $blog->name        = $request->input('name') ;
        $blog->about       = $request->input('about')  ;
        $blog->image       = $fileNameToStore;
        $blog->save();

        return redirect()->route('new.home')->withSuccessMessage('Your Request Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('blog.show')->with(['blog'=> $blog, 'count'=>$count ,'comments'=>$comments]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('blog.edit')->with(['blog'=> $blog, 'count'=>$count ,'comments'=>$comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
       // dd($request);
        $this->validate(request(), [

            'name'        => 'required',
            'about'       => 'required',
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


        $blog = Blog::findOrFail($blog->id);
        $blog->name        = $request->input('name') ;
        $blog->about       = $request->input('about')  ;
        $blog->image       = $fileNameToStore;
        $blog->save();

        return redirect()->route('new.home')->withSuccessMessage('Your Request Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);
        $blog->delete();
        return redirect()->route('new.home')->withSuccessMessage('Your Request Deleted Was Done');

    }
}
