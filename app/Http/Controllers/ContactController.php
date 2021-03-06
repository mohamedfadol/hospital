<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Hospital;
use Illuminate\Http\Request;

class ContactController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospital   = Hospital::first();
        return view('forentend.contact.index')->with(['hospital'=>$hospital]);
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
            'email'   => 'required',
            'subject'   => 'required',
            'message'  => 'required',
        ]);

        $contact = new Contact;
        $contact->name   = $request->input('name') ;
        $contact->email  = $request->input('email')  ;
        $contact->subject  = $request->input('subject')  ;
        $contact->message  = $request->input('message')  ;
        $contact->save();

        return redirect()->back()->with(['success' => 'Inserted Has Been Done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
