<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Auth::user()->favorite_posts;
        return view('author.favorite',compact('posts'));
    }
}
