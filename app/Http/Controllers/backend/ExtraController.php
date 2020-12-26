<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ExtraController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function videoindex()
    {
    	$video=DB::table('videos')->get();
    	return view('backend.video.index',compact('video'));
    }
    public function storevideo(Request $request)
    {
    	 $validatedData = $request->validate([
        'embed_code' => 'required',
        
    ]);

      $data=array();
      $data['embed_code']=$request->embed_code;
      $data['first_video']=$request->first_video;
      $data['second_video']=$request->second_video;
      DB::table('videos')->insert($data);
      $notification=array(
          'messege'=>'Successfully Added',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
    public function deletevideo($id)
    {
    	DB::table('videos')->where('id',$id)->delete();
    	$notification=array(
          'messege'=>'Successfully Deleted',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
    public function editvideo($id)
    {
    	$edit=DB::table('videos')->where('id',$id)->first();
    	return view('backend.video.edit',compact('edit'));
    }
    public function updatevideo(Request $request,$id)
    {
    	 $validatedData = $request->validate([
        'embed_code' => 'required',
        
    ]);
    	$data=array();
      $data['embed_code']=$request->embed_code;
      $data['first_video']=$request->first_video;
      $data['second_video']=$request->second_video;
      DB::table('videos')->where('id',$id)->update($data);
      $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->route('video')->with($notification);
    }
}
