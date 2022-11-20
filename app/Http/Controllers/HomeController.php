<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services=Service::latest()->take(3)->get();
        $latest_posts=Post::latest()->withCount('comments')->take(6)->get();
        //dd($latest_posts);
        return view('home',[
            'services'=>$services,
            'latest_posts'=>$latest_posts
        ]);
    }
}
