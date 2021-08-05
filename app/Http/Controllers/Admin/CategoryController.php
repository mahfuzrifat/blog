<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;
class CategoryController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    { 
    	 $cat = Category::all();
        return view('admin.category.index')->with('cat',$cat) ;
    }

    public function create()
    {
        return view('admin.category.create');
    }

public function store(Request $request)
    {    
     $request->validate([
    'name' => 'required|unique:categories|min:3|max:50', 
    'photo' => 'required', 
       ]);
    $image = $request->file('photo');
     
    $slug = str_slug($request->name);
    if (isset($image)) {
       $currentdate = Carbon::now()->toDateString();
       $imagename = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
       if (!Storage::disk('public')->exists('category')) {
       	Storage::disk('public')->makeDirectory('category');
       }

       $category =Image::make($image)->resize(1600,479)->encode();
       Storage::disk('public')->put('category/'.$imagename, $category);

       if (!Storage::disk('public')->exists('category/slider')) {
       	Storage::disk('public')->makeDirectory('category/slider');
       }
       $slider =Image::make($image)->resize(500,333)->encode();
       Storage::disk('public')->put('category/slider/'.$imagename, $slider);
    }else{
    	$imagename='default.png';
    }

    $cat = new Category();
    $cat->name = $request->name;
    $cat->slug = str_slug($request->name);
    $cat->photo = $imagename;
    $cat->c_status = $request->c_status;
    $cat->save();
    
     if ($cat) {
        $notification=array(
                 'messege'=>'New Category Added Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.category.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         }
    }

     public function destroy($id)
    {
         $category=Category::find($id);

         if(Storage::disk('public')->exists('category/'.$category->photo)) {
       	 Storage::disk('public')->delete('category/'.$category->photo);
       }
      if (Storage::disk('public')->exists('category/slider/'.$category->photo)) {
       	Storage::disk('public')->delete('category/slider/'.$category->photo);
       }
       $category->delete();
        if ($category) {
        $notification=array(
                 'messege'=>'Category Deleted Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.category.index')->with($notification);
         }else{
            $notification=array(
                 'messege'=>'Something worng !!',
                 'alert-type'=>'error'
                  );
            return Redirect()->back()->with($notification);
         }
    }

     public function edit($id)
    {
       $cat = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit')->with('cat',$cat);
    }

    public function   update(Request $request,$id)
    {   	  
     $request->validate([
    'name' => 'required|min:3|max:50',  
       ]);

    $image = $request->file('photo');
     
    $slug = str_slug($request->name);
    $c_status = $request->c_status;
    $category=Category::find($id);
    if (isset($image)) {
       $currentdate = Carbon::now()->toDateString();
       $imagename = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
       if (!Storage::disk('public')->exists('category')) {
       	Storage::disk('public')->makeDirectory('category');
       }

       if(Storage::disk('public')->exists('category/'.$category->photo)) {
       	 Storage::disk('public')->delete('category/'.$category->photo);
       }


       $categoryimage =Image::make($image)->resize(1600,479)->encode();
       Storage::disk('public')->put('category/'.$imagename, $categoryimage);

       if (!Storage::disk('public')->exists('category/slider')) {
       	Storage::disk('public')->makeDirectory('category/slider');
       }

        if (Storage::disk('public')->exists('category/slider/'.$category->photo)) {
       	Storage::disk('public')->delete('category/slider/'.$category->photo);
       }

       $slider =Image::make($image)->resize(500,333)->encode();
       Storage::disk('public')->put('category/slider/'.$imagename, $slider);
    }else{
    	$imagename = $category->photo;
    }

    $category->name = $request->name;
    $category->slug = str_slug($request->name);
    $category->photo = $imagename;
    $category->c_status =$c_status;
    $category->save();
    
     if ($category) {
        $notification=array(
                 'messege'=>'  Category Updated Successfully !!',
                 'alert-type'=>'success'
                  );
           return Redirect()->route('admin.category.index')->with($notification);
         }else{
            return Redirect()->back()->with($notification);
         }
    }

}


