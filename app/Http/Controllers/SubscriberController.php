<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Redirect;
class SubscriberController extends Controller
{
    public function store(Request $request){
      $request->validate([
    'email' => 'required|unique:subscribers|email',
     
       ]);
      $subscriber = new Subscriber();
      $subscriber->email = $request->email;
      $subscriber->save();
      if ($subscriber) {
        $notification=array(
                 'messege'=>'Your Subscription is Completely Done !!',
                 'alert-type'=>'success'
                  );
           return Redirect::to('/')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         } 
    }
}
