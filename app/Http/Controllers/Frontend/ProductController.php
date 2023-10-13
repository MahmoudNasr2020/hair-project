<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->simplePaginate(20);
        //$latest_blogs = Blog::latest()->limit(4)->get();
        return view('frontend.pages.products',['products'=>$products]);
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('frontend.pages.one_product',['product'=>$product]);
    }
}
