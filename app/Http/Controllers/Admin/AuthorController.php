<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('role_id',2)
            ->withCount('posts')
            ->withCount('comments')
            ->withCount('favorite_posts')
            ->get();
        return view('admin.authors',compact('user'));
    }
    public function destroy($id){
        $user = User::findOrFail($id)->delete();
        if ($user) {
            $notification=array(
                'messege'=>'Author Deleted Successfully !!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

}
