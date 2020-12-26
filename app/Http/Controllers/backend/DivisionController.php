<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DivisionController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$division=DB::table('divisions')->get();
    	return view('backend.division.index',compact('division'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'division_en' => 'required|unique:divisions|max:255',
        'division_bn' => 'required|unique:divisions|max:255',
    ]);

        $data=array();
        $data['division_en']=$request->division_en;
        $data['division_bn']=$request->division_bn;
         DB::table('divisions')->insert($data);
         $notification=array(
          'messege'=>'Successfully Division Added',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
    public function delete($id)
    {
    	DB::table('divisions')->where('id',$id)->delete();
    	 	$notification=array(
            'messege'=>'Successfully Division Deleted',
            'alert-type'=>'success'
             );
    	 	return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {

    	 $edit=DB::table('divisions')->where('id',$id)->first();
    	return view('backend.division.edit',compact('edit'));
    }
    public function update(Request $request,$id)
    {
    	  $validatedData = $request->validate([
        'division_en' => 'required|max:255',
        'division_bn' => 'required|max:255',
    ]);
    	 $data=array();
        $data['division_en']=$request->division_en;
        $data['division_bn']=$request->division_bn;
         DB::table('divisions')->where('id',$id)->update($data);
         $notification=array(
            'messege'=>'Successfully Division update',
            'alert-type'=>'success'
             );
    	 	return Redirect()->route('division')->with($notification);
    }
}
