<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Comment;
use App\Hospital;
use Illuminate\Http\Request;

class forBlogController extends Controller
{


    public function index()
    {
        $news = Blog::all();
        $hospital   = Hospital::first();
        $comments = Comment::all();
        return view('forentend.blog.index')->with(['news' => $news , 'comments'=> $comments, 'hospital'=> $hospital]);
    }


    public function show(Blog $new)
    {
        $new = Blog::findOrFail($new->id);
        $comments = Comment::all();
        $comment = Comment::first();
        return view('forentend.blog.show')->with(['new'=> $new , 'comments'=> $comments ,'comment'=> $comment]);

    }

}
