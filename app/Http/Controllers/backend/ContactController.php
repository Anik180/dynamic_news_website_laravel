<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class ContactController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$con=DB::table('contact')->first();
    	return view('backend.setting.contact',compact('con'));
    }
    public function updatecontact(Request $request,$id)
    {
    	   $data=array();
           $data['editor_bn']=$request->editor_bn;
           $data['editor_en']=$request->editor_en;
           $data['address_bn']=$request->address_bn;
           $data['address_en']=$request->address_en;
           $data['contact_number_bn']=$request->contact_number_bn;
           $data['contact_number_en']=$request->contact_number_en;         
           $data['map']=$request->map;         
           DB::table('contact')->where('id',$id)->update($data);
           $notification=array(
           'messege'=>'Successfully Contact update',
           'alert-type'=>'success'
               );
          return Redirect()->back()->with($notification);
    }
    public function logo()
    {
    	$logo=DB::table('logo')->first();
    	return view('backend.setting.logo',compact('logo'));
    }
    public function updatelogo(Request $request,$id)
    {
    	$oldimage=$request->oldimage;
        $image=$request->logo;
        if($image){
        $image_one=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,300)->save('public/postimage/'.$image_one);
        $data['logo']='public/postimage/'.$image_one;
        DB::table('logo')->where('id',$id)->update($data);
        unlink($oldimage);
        $notification=array(
        'messege'=>'Successfully logo update',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        }
        $data['logo']=$oldimage;
        DB::table('logo')->where('id',$id)->update($data);  
        $notification=array(
        'messege'=>'Successfully logo update',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function socialsetting()
    {
    	$social=DB::table('social')->first();
    	return view('backend.social',compact('social'));
    }
    public function updatesocial(Request $request,$id)
    {
    	$data=array();
    	$data['facebook']=$request->facebook;
    	DB::table('social')->where('id',$id)->update($data);
    	$notification=array(
        'messege'=>'Successfully Social update',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
