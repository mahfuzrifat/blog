<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Post;
class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $categories = Category::all();
        $post = Post::latest()->approved()->published()->paginate(6);
        return view('welcome',compact('categories','post'));
    }
}
