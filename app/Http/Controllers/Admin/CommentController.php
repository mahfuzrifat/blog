<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $comments = Comment::latest()->get();
        return view('admin.comments',compact('comments'));
    }
    public function destroy($id){
            $comment = Comment::findOrFail($id)->delete();
        if ($comment) {
            $notification=array(
                'messege'=>'Comments Deleted Successfully !!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

}
