<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->simplePaginate(15);
        $latest_blogs = Blog::latest()->limit(4)->get();
        return view('frontend.pages.blog',['blogs'=>$blogs,'latest_blogs'=>$latest_blogs]);
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('frontend.pages.blog_post',['blog'=>$blog]);
    }
}
