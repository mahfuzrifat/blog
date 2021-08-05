<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$sub = Subscriber::latest()->get();
    	return view('admin.subscriber')->with('sub',$sub);
    }
    public function destroy($id){
    	 
    	 $subscriber = Subscriber::findOrFail($id);
         $subscriber->delete();
    	if ($subscriber) {
        $notification=array(
                 'messege'=>'Subscriber Deleted Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.subscriber.index')->with($notification);
         }else{
         	$notification=array(
                 'messege'=>'Something Went Wrong !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         } 
    }
    
}
