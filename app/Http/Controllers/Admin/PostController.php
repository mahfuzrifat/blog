<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag; 
use Carbon\Carbon;
use App\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Notifications\AuthorPostApprove;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SubscriberNotify;
class PostController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
         $post =Post::latest()->get();
        return view('admin.post.index')->with('post',$post);
    }

    public function create(){
    	$categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create',compact('categories','tags'));
    }

    public function store(Request $request){
     $request->validate([
    'title' => 'required|unique:posts|min:15|max:100',
    'categories' => 'required',
    'tags' => 'required',
    'body' => 'required|min:50|max:12000',
    'photo' => 'required', 
       ]);
     $image = $request->file('photo');
     $slug = str_slug($request->title);
     if (isset($image)) {
         
     $currentdate = Carbon::now()->toDateString();
        $imagename  = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
         if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
         }

         $postimage = Image::make($image)->resize(1600,1066)->encode();
          Storage::disk('public')->put('post/'.$imagename,$postimage);
     } else {
         $imagename='deault.png'; 
     }
     $post = new Post();
     $post->user_id = Auth::user()->id;
     $post->title = $request->title;
     $post->slug =$slug ;
     $post->image = $imagename;
     $post->p_status = $request->p_status;
     $post->body = $request->body;
     $post->is_approved= true;
     $post->save();
     $post->categories()->attach($request->categories);
     $post->tags()->attach($request->tags);

     $subscribers = Subscriber::all();
     foreach ($subscribers as $subscriber) {
         Notification::route('mail',$subscriber->email)
                   ->notify(new SubscriberNotify($post));
     }
      if ($post) {
        $notification=array(
                 'messege'=>'New Post Added Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.post.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         } 
 }

    public function edit($id){
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','categories','tags'));
    }

    public function update(Request $request,$id){
        $request->validate([
    'title' => 'required|min:15|max:100',
    'categories' => 'required',
    'tags' => 'required',
    'body' => 'required|min:50|max:2000',
    'photo' => 'image', 
       ]);
     $image = $request->file('photo');
     $slug = str_slug($request->title);
     $post = Post::find($id);
     if (isset($image)) {
         
     $currentdate = Carbon::now()->toDateString();
        $imagename  = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
         if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
         }

         if (Storage::disk('public')->exists('post/'.$post->image)) {
            Storage::disk('public')->delete('post/'.$post->image);
         }

         $postimage = Image::make($image)->resize(1600,1066)->encode();
          Storage::disk('public')->put('post/'.$imagename,$postimage);
     } else {
         $imagename= $post->image; 
    } 


     $post->user_id = Auth::user()->id;
     $post->title = $request->title;
     $post->slug =$slug ;
     $post->image = $imagename;
     $post->p_status = $request->p_status;
     $post->body = $request->body;
     $post->is_approved= true;
     $post->save();
     $post->categories()->sync($request->categories);
     $post->tags()->sync($request->tags);
      if ($post) {
        $notification=array(
                 'messege'=>'Post Updated Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.post.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         } 
    }

    public function pending(){
        $post = Post::where('is_approved',false)->get();
        return view('admin.post.pending')->with('post',$post);
    }

    public function approve($id){
        $post = Post::find($id);
        if ($post->is_approved == false) {
            $post->is_approved = true;
            $post->save();
          $post->user->notify(new AuthorPostApprove($post));
         $subscribers = Subscriber::all();
     foreach ($subscribers as $subscriber) {
         Notification::route('mail',$subscriber->email)
                   ->notify(new SubscriberNotify($post));
     }
         if ($post) {
        $notification=array(
                 'messege'=>'Post Approved Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.post.index')->with($notification);
         }else{
            $notification=array(
                 'messege'=>'Something worng !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         }
        }  
    }
        

    public function destroy($id){
        $post=Post::findOrFail($id);
         if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->categories()->detach();
        $post->tags()->detach();

        $post->delete(); 
         if ($post) {
        $notification=array(
                 'messege'=>'Post Deleted Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.post.index')->with($notification);
         }else{
            $notification=array(
                 'messege'=>'Something worng !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         }
    }

    public function show($id){
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.post.show',compact('post','categories','tags'));
    }


}
