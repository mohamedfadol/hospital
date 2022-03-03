<?php

namespace App\Http\Controllers;

use App\Price;
use App\Hospital;
use App\Customr;
use App\Comment;
use Illuminate\Http\Request;
use Alert;

class PriceController extends Controller 
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
        $prices = Price::all();
        $hospital = Hospital::first();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('price.index')->with(['hospital' => $hospital, 
                    'count'=>$count ,
                    'prices'=>$prices ,
                    'comments'=>$comments]);
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
        return view('price.create')->with(['count'=>$count ,'comments'=>$comments]);
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

            'type'    => 'required',
            'price' => 'required',
            'service' => 'required',
            'about'   => 'required'
        ]);

        $price = new Price;
        $price->type     = $request->input('type') ;
        $price->price    = $request->input('price')  ;
        $price->about     = $request->input('about')  ;
        $price->service    = $request->input('service')  ;
        $price->save();

        return redirect()->route('price.home')->withSuccessMessage('Inserted Has Been Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        $price = Price::findOrFail($price->id);
        $hospital = Hospital::first();
        $count = Customr::where('status' , 0)->get();
        $comments = Comment::all();
        return view('price.edit')->with(['hospital' => $hospital, 
                    'count'=>$count ,
                    'price'=>$price ,
                    'comments'=>$comments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
       // dd($request);
        $this->validate(request(), [

            'type'    => 'required',
            'price' => 'required',
            'about'   => 'required'
        ]);
        $price = Price::findOrFail($price->id);
        $price->type     = $request->input('type') ;
        $price->price    = $request->input('price')  ;
        $price->about    = $request->input('about')  ;
        $price->service    = $request->input('service')  ;
        $price->save();

        return redirect()->route('price.home')->withSuccessMessage('Updated Has Been Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price = Price::findOrFail($price->id);
        $price->delete();
        return redirect()->route('price.home')->withSuccessMessage('Deleted Has Been Done');

    }
}
