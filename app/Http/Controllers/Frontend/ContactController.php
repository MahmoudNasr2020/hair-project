<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }
    
    public function store(Request $request)
    {
         $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'message' => 'required',
        ]);
        Contact::create(['name'=>$request->name,'email'=>$request->email,'message'=>$request->message]);
        return ['error'=>false];
    }
}
