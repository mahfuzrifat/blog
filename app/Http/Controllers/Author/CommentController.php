<?php

namespace App\Http\Controllers\Author;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $posts = Auth::user()->posts;
        return view('author.comments',compact('posts'));
    }
    public function destroy($id){

        $comment = Comment::findOrFail($id);
        if ($comment->post->user->id == Auth::id())
        {
            $comment->delete();
            if ($comment) {
                $notification=array(
                    'messege'=>'Comments Deleted Successfully !!',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'messege'=>'You are not permited for this action !!',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }  else{
            return redirect()->back();
        }

    }
}
