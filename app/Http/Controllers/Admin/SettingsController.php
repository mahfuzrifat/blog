<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(){
    	return view('admin.settings');
    }

    public function update(Request $request,$id){ 
    	   $this->validate($request,[
				'name' => 'required|min:3|max:50',
				'email' => 'required|email', 
				'about' => 'required|min:30|max:350',
				'photo' => 'required|image', 
				   ]);
       $image = $request->file('photo');
       $slug = str_slug($request->name);
       $user= User::findOrFail(Auth::id());
       if (isset($image)) {
       	 $currentDate = Carbon::now()->toDateString();
       	 $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

       	 if (!Storage::disk('public')->exists('profile')) {
       	 	 Storage::disk('public')->makeDirectory('profile');
       	 }

       	 if (Storage::disk('public')->exists('profile/'.$user->photo)) {
       	 	Storage::disk('public')->delete('profile/'.$user->photo);
       	 }

       	 $profile = Image::make($image)->resize(500,500)->encode();
       	 Storage::disk('public')->put('profile/'.$imageName,$profile);
       } else {
       	  $imageName = $user->image;
       }
       $user->name = $request->name;
       $user->email = $request->email;
       $user->photo = $imageName;
       $user->about= $request->about; 
        return $user;
       $user->save();
       if ($user) {
        $notification=array(
                 'messege'=>'Account Updated Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.settings.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         } 
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePassword(Request $request){
       $this->validate($request,[
           'o_password' => 'required',
           'password' => 'required|confirmed',
       ]);
       $hasPassword = Auth::user()->password;
       if (Hash::check($request->o_password,$hasPassword)){
           if (!Hash::check($request->password,$hasPassword)){
               $user = User::find(Auth::id());
               $user->password = Hash::make($request->password);
               $user -> save();
               if ($user) {
                   $notification=array(
                       'messege'=>'Password Updated Successfully !!',
                       'alert-type'=>'success'
                   );
                   Auth::logout();
                   return redirect()->back();
               }
           }else{
               $notification=array(
                   'messege'=>'New Password Can not be same as like old password !!',
                   'alert-type'=>'error'
               );
               return Redirect()->route('admin.settings.index')->with($notification);
           }
       }else{
           $notification=array(
               'messege'=>'Input Your Valid Password !!',
               'alert-type'=>'error'
           );
           return Redirect()->route('admin.settings.index')->with($notification);
       }

    }
}
