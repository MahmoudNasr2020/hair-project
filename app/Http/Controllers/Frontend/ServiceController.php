<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();
        return view('frontend.pages.services',['services'=>$services]);
    }
}
