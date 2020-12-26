<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class AdsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function verticalads()
    {
    	$vertical=DB::table('verticals')->get();
    	return view('backend.ads.vertical',compact('vertical'));
    }
    public function storevertical(Request $request)
    {
    	$validatedData = $request->validate([
        'ads' => 'required',
     ]);

     	   $data=array();
     	   $data['ads_url']=$request->ads_url;
     	   $image=$request->ads;
     	   if($image){
     	   	$image_one=uniqid().'.'.$image->getClientOriginalExtension();
     	   	Image::make($image)->resize(970,90)->save('public/allad/'.$image_one);
     	   	$data['ads']='public/allad/'.$image_one;
     	   	DB::table('verticals')->insert($data);
     	 $notification=array(
          'messege'=>'Successfully Added',
           'alert-type'=>'success'
             );
     	   	return Redirect()->back()->with($notification);
     	   }else{
     	   	return Redirect()->back();
     	   }
    }
    public function deletevertical($id)
    {
    	   $ads=DB::table("verticals")->where('id',$id)->first();
           unlink($ads->ads);
           DB::table("verticals")->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Delete',
          'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
    public function editvertical($id)
    {
    	$edit=DB::table('verticals')->where('id',$id)->first();
    	return view('backend.ads.edit_vertical',compact('edit'));
    }
    public function updatevertical(Request $request,$id)
    {
    	$data=array();
     	
     	  $data['ads_url']=$request->ads_url;
           $oldimage=$request->oldimage;
           $image=$request->ads;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(970,90)->save('public/allad/'.$image_one);
            $data['ads']='public/allad/'.$image_one;
            DB::table('verticals')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully  update',
           'alert-type'=>'success'
             );
            return Redirect()->route('vertical.ads')->with($notification);
           }
            $data['ads']=$oldimage;
             DB::table('verticals')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully  update',
            'alert-type'=>'success'
             );
            return Redirect()->route('vertical.ads')->with($notification);
    }
}
