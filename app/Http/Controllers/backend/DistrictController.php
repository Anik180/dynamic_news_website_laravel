<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DistrictController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
  	$district=DB::table('districts')
  	->join('divisions','districts.division_id','divisions.id')
  	->select('divisions.division_en','districts.*')->get();
    	$division=DB::table('divisions')->get();
    	return view('backend.district.index', compact('district','division'));

    }
    public function store(Request $request)
    {
    	 $validatedData = $request->validate([
        'district_en' => 'required|unique:districts|max:55',
        'district_bn' => 'required|unique:districts|max:55',
         'division_id' => 'required',
     ]);
    	   $data=array();
    	   $data['district_en']=$request->district_en;
    	   $data['district_bn']=$request->district_bn;
    	   $data['division_id']=$request->division_id;
    	   DB::table('districts')->insert($data);
    	   $notification=array(
          'messege'=>'Successfully District Added',
          'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function delete($id)
    {
    	  DB::table('districts')->where('id',$id)->delete();
          $notification=array(
          'messege'=>'Successfully district Deleted',
          'alert-type'=>'success'
             );
          return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
    	$district=DB::table('districts')->where('id',$id)->first();
    	$division=DB::table('divisions')->get();
        return view('backend.district.edit',compact('district','division'));
    }

    public function update(Request $request,$id)
    {
    	 $validatedData = $request->validate([
        'district_en' => 'required|max:55',
        'district_bn' => 'required|max:55',
        'division_id' => 'required',
     ]);
      $data=array();
      $data['district_en']=$request->district_en;
      $data['district_bn']=$request->district_bn;
      $data['division_id']=$request->division_id;
      DB::table('districts')->where('id',$id)->update($data);
     $notification=array(
          'messege'=>'Successfully District update',
           'alert-type'=>'success'
             );
   return Redirect()->route('district')->with($notification);
    }
}
