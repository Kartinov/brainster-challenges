<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $bgCover = asset('images/home-bg.jpg');

        return view('blog.home', compact('bgCover'));
    }

    public function about()
    {
        $bgCover = asset('images/about-bg.jpg');

        return view('blog.about', compact('bgCover'));
    }

    public function contact()
    {
        $bgCover = asset('images/contact-bg.jpg');

        return view('blog.contact', compact('bgCover'));
    }

    public function samplePost()
    {
        $bgCover = asset('images/blog-image.jpg');

        return view('blog.sample-post', compact('bgCover'));
    }
}
