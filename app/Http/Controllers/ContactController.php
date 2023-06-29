<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    //
    public function store(Request $request){
        request()->validate([
            'name'=> ['required','between:2,255'],
            'email'=>['required','email'],
            'phone'=>['required','numeric'],
            'message' => ['required', 'regex:/^[^<>]*$/'],
        ],[
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'phone.required'=>'Phone number is required',
            'phone.integer'=>'Phone can not be string',
            'name.between'=>'Name has to be minimum 2 characters long'
        ]);
        //data wordt gekuist door de htmlspecialschars
        $data = array_map('htmlspecialchars', $request->all());
        Mail::to('contact@awesomesneakers.com')->send(new Contact($data));
        Session::flash('contactForm');
        return redirect()->route("frontend.home");
    }
}
