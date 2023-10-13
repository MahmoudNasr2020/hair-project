<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::orderBy('id','desc')->first();
        $clients = Client::orderBy('id','desc')->get();
        return view('frontend.pages.about',['about'=>$about,'clients'=>$clients]);
    }
}
