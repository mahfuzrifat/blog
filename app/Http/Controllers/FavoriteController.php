<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add($post)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_posts()->where('post_id', $post)->count();
        if ($isFavorite == 0) {
           $user->favorite_posts()->attach($post);
                $notification = array(
                    'messege' => 'Post Successfully Added to Your Favorite List !!',
                    'alert-type' => 'success');
                return redirect()->back()->with($notification);
            } else {
                $user->favorite_posts()->detach($post);
                    $notification = array(
                        'messege' => 'Successfully removed from Your Favorite List !!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
            }

}
