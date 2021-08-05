<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function __construct(){
    	 $this->middleware('auth');
    }

    public function store(Request $request,$post){

    	$comment = new Comment();
    	$comment->user_id = Auth::id();
    	$comment->post_id = $post;
    	$comment->comment = $request->comment;
    	$comment->save();
    	if ($comment) {
        $notification=array(
                 'messege'=>'Comment Successfully Added !!',
                 'alert-type'=>'success'
                  );
            return Redirect()->back()->with($notification); 
         }else{
            return Redirect()->back()->with($notification);
         }
    }
}
