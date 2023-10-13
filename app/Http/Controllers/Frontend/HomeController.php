<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $silders = Slider::orderBy('id','desc')->get();
        $about = About::orderBy('id','desc')->first();
        $clients = Client::orderBy('id','desc')->get();
        $Statistics = Statistic::orderBy('id','desc')->get();
        $products = Product::orderBy('id','desc')->limit(9)->get();
        return view('frontend.index',['sliders'=>$silders,'about'=>$about,'clients'=>$clients,
                                     'Statistics'=>$Statistics,'products'=>$products]);
    }
}
