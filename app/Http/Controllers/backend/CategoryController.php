<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$category=DB::table('categories')->get();
    	return view('backend.category.index',compact('category'));
    }
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'category_bn' => 'required',
        
    ]);

      $data=array();
      $data['category_bn']=$request->category_bn;
      $data['category_en']=$request->category_en;
      DB::table('categories')->insert($data);
      $notification=array(
          'messege'=>'Successfully Added',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
    public function delete($id)
    {
    	DB::table('categories')->where('id',$id)->delete();
    	$notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('backend.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
    	 $validatedData = $request->validate([
        'category_bn' => 'required',
        
    ]);
    	$data=array();
      $data['category_bn']=$request->category_bn;
      $data['category_en']=$request->category_en;
      DB::table('categories')->where('id',$id)->update($data);
      $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('category')->with($notification);
    }
    
}
