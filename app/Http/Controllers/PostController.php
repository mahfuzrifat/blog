<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
class PostController extends Controller
{
	public function all(){
		$posts = Post::latest()->approved()->published()->paginate(6);
		return view('posts',compact('posts'));
	}
    public function view($id){
    	$post = Post::where('id',$id)->approved()->published()->first();
    	$key = 'blog_'.$post->id;
    	if (!Session()->has($key)) {
    		 $post->increment('view_count');
            Session::put($key,1);
    	}
    	$randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
    	return view('post_view',compact('post','randomposts'));
    }

    public function postByCategory($id){
	   $category = Category::where('id',$id)->first();
	  $posts = $category->posts()->approved()->published()->get();
	   return view('category_post',compact('category','posts'));
    }
    public function postByTag($id){
        $tag = Tag::where('id',$id)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag_post',compact('tag','posts'));
    }
}
