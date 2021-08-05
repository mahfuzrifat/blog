<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Category;
use Carbon\Carbon;
use App\User;
use App\Notifications\NewAuthorPost;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$post = Auth::user()->posts()->get();
    	return view('author.post.index')->with('post',$post);
    }

     public function create(){
    	$categories = Category::all();
        $tags = Tag::all();
        return view('author.post.create',compact('categories','tags'));
    }

    public function store(Request $request){
     $request->validate([
    'title' => 'required|unique:posts|min:15|max:100',
    'categories' => 'required',
    'tags' => 'required',
    'body' => 'required|min:50|max:2000',
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
     $post->slug =$slug;
     $post->image = $imagename;
     $post->p_status = $request->p_status;
     $post->body = $request->body;
     $post->is_approved= false;
     $post->save();
     $post->categories()->attach($request->categories);
     $post->tags()->attach($request->tags);

     $users = User::where('role_id','1')->get();
     Notification::send($users, new NewAuthorPost($post));

      if ($post) {
        $notification=array(
                 'messege'=>'New Post Added Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('author.post.index')->with($notification);
         }else{
         	$notification=array(
                 'messege'=>'problem !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         } 
 }

    public function edit($id){
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        if ($post->user_id != Auth::id()) {
             $notification=array(
                 'messege'=>'You are not Authorised for this action !!',
                 'alert-type'=>'error'
                  );
           return Redirect()->back()->with($notification);
        } else {
        return view('author.post.edit',compact('post','categories','tags'));
            
        }
        
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
     $post->is_approved= false;
     $post->save();
     $post->categories()->sync($request->categories);
     $post->tags()->sync($request->tags);
      if ($post) {
        $notification=array(
                 'messege'=>'Post Updated Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('author.post.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         } 
    }


    public function show($id){
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        if ($post->user_id != Auth::id()) {
             $notification=array(
                 'messege'=>'You are not Authorised for this action !!',
                 'alert-type'=>'error'
                  );
           return Redirect()->back()->with($notification);
        } else {
           return view('author.post.show',compact('post','categories','tags'));
        }
        
    }

     public function destroy($id){
         $dlt= Post::find($id);
         if ($dlt->user_id != Auth::id()) {
             $notification=array(
                 'messege'=>'You are not Authorised for this action !!',
                 'alert-type'=>'error'
                  );
           return Redirect()->back()->with($notification);
         } else {
             if (Storage::disk('public')->exists('post/'.$dlt->image))
        {
            Storage::disk('public')->delete('post/'.$dlt->image);
        }
        $dlt->categories()->detach();
        $dlt->tags()->detach();

        $dlt->delete(); 
         if ($dlt) {
        $notification=array(
                 'messege'=>'Post Deleted Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('author.post.index')->with($notification);
         }else{
            $notification=array(
                 'messege'=>'Something worng !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         }
         }
         
        
    }
}
