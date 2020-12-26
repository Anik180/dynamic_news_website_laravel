<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    		$subcategory=DB::table('sub_categories')->join('categories','sub_categories.category_id','categories.id')->select('categories.category_en','categories.category_bn','sub_categories.*')->get();
    		$category=DB::table('categories')->get();
    	   return view('backend.subcategory.index',compact('subcategory','category'));
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
        'subcategory_en' => 'required|unique:sub_categories|max:55',
        'subcategory_bn' => 'required|unique:sub_categories|max:55',
        'category_id' => 'required',
     ]);
      $data=array();
      $data['subcategory_en']=$request->subcategory_en;
      $data['subcategory_bn']=$request->subcategory_bn;
      $data['category_id']=$request->category_id;
      DB::table('sub_categories')->insert($data);
$notification=array(
          'messege'=>'Successfully Added',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
    	   DB::table('sub_categories')->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Deleted',
          'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
    $subcategory=DB::table('sub_categories')->where('id',$id)->first();
    $category=DB::table('categories')->get();
     return view('backend.subcategory.edit',compact('subcategory','category'));
    }
    public function update(Request $request,$id)
    {
    	  $validatedData = $request->validate([
        'subcategory_en' => 'required|max:55',
        'subcategory_bn' => 'required|max:55',
        'category_id' => 'required',
     ]);
      $data=array();
      $data['subcategory_en']=$request->subcategory_en;
      $data['subcategory_bn']=$request->subcategory_bn;
      $data['category_id']=$request->category_id;
      DB::table('sub_categories')->where('id',$id)->update($data);
$notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('subcategory')->with($notification);
    }

}
