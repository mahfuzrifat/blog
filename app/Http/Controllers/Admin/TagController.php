<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Tag;
class TagController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $tag = Tag::all();
        return view('admin.tag.index')->with('tag',$tag);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

     public function edit($id)
    {
       $tag = DB::table('tags')->where('id',$id)->first();
        return view('admin.tag.edit')->with('tag',$tag);
    }

     public function destroy($id)
    {
         $dlt=DB::table('tags')->where('id',$id)->delete();
        
        if ($dlt) {
        $notification=array(
                 'messege'=>'Tag Deleted Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.tag.index')->with($notification);
         }else{
            $notification=array(
                 'messege'=>'Something worng !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         }
    }

     public function store(Request $request)
    {
     $request->validate([
    'name' => 'required|unique:tags|min:3|max:50', 
       ]);
    
    $tag = new Tag();
    $tag->name = $request->name;
    $tag->slug = str_slug($request->name);
    $tag->t_status =$request->t_status;
    $tag->save();
     if ($tag) {
        $notification=array(
                 'messege'=>'New Tag Added Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.tag.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         }

    }

     public function update(Request $request, $id)
    {
        $request->validate([
    'name' => 'required|min:3|max:50', 
       ]);
    
    $tag = Tag::find($id);
    $tag->name = $request->name;
    $tag->slug = str_slug($request->name);
    $tag->t_status =$request->t_status;
    $tag->save();
     if ($tag) {
        $notification=array(
                 'messege'=>'Tag Updated Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.tag.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         }
    }

}
