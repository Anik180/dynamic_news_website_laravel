<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use Auth;
class PostController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$post=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('sub_categories','posts.subcategory_id','sub_categories.id')
        ->select('posts.*','categories.category_bn','sub_categories.subcategory_bn')
        ->get();
    	return view('backend.post.index',compact('post'));

    }
    public function create()
    {
        $category=DB::table('categories')->get();
        $division=DB::table('divisions')->get();
        return view('backend.post.create',compact('category','division'));
    }

    public function storepost(Request $request)
    {
     	$data=array();
     	$data['title_bn']=$request->title_bn;
     	$data['title_en']=$request->title_en;
     	$data['user_id']=Auth::id();
     	$data['category_id']=$request->category_id;
     	$data['subcategory_id']=$request->subcategory_id;
     	$data['division_id']=$request->division_id;
     	$data['district_id']=$request->district_id;
     	$data['detail_en']=$request->detail_en;
     	$data['detail_bn']=$request->detail_bn;
     	$data['image_caption']=$request->image_caption;
     	$data['headline']=$request->headline;
     	$data['big_thumbnail']=$request->big_thumbnail;
     	$data['first_section']=$request->first_section;
     	$data['second_section']=$request->second_section;
     	$data['second_section_thumbnail']=$request->second_section_thumbnail;
     	$data['second_section_big_thumbnail']=$request->second_section_big_thumbnail;
     	$data['second_section_small_thumbnail']=$request->second_section_small_thumbnail;
     	$data['post_date']=date('d-m-Y');
     	$data['post_month']=date('F');
     	$image=$request->image;
     	if($image){
     	$image_one=uniqid().'.'.$image->getClientOriginalExtension();
     	Image::make($image)->resize(500,300)->save('public/postimage/'.$image_one);
     	$data['image']='public/postimage/'.$image_one;
     	DB::table('posts')->insert($data);
        $notification=array(
        'messege'=>'Successfully Post Added',
        'alert-type'=>'success'
        );
     	return Redirect()->back()->with($notification);
     	}else{
     	return Redirect()->back();
     	}

    }

    public function deletepost($id)
    {
    	$post=DB::table("posts")->where('id',$id)->first();
        unlink($post->image);
        DB::table("posts")->where('id',$id)->delete();
        $notification=array(
        'messege'=>'Successfully Delete Post',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editpost($id)
    {
    	$post=DB::table("posts")->where('id',$id)->first();
        $category=DB::table('categories')->get();
        $division=DB::table('divisions')->get();
        return view('backend.post.edit',compact('post','category','division'));
    }

    public function updatepost(Request $request,$id)
    {
        $data=array();
     	$data['title_bn']=$request->title_bn;
     	$data['title_en']=$request->title_en;
     	$data['user_id']=Auth::id();
     	$data['category_id']=$request->category_id;
     	$data['subcategory_id']=$request->subcategory_id;
     	$data['division_id']=$request->division_id;
     	$data['district_id']=$request->district_id;
     	$data['detail_en']=$request->detail_en;
     	$data['detail_bn']=$request->detail_bn;
     	$data['image_caption']=$request->image_caption;
     	$data['headline']=$request->headline;
     	$data['big_thumbnail']=$request->big_thumbnail;
     	$data['first_section']=$request->first_section;
     	$data['second_section']=$request->second_section;
     	$data['second_section_thumbnail']=$request->second_section_thumbnail;
     	$data['second_section_big_thumbnail']=$request->second_section_big_thumbnail;
     	$data['second_section_small_thumbnail']=$request->second_section_small_thumbnail;
           $oldimage=$request->oldimage;
           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('public/postimage/'.$image_one);
            $data['image']='public/postimage/'.$image_one;
            DB::table('posts')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully Post update',
           'alert-type'=>'success'
             );
            return Redirect()->route('all.post')->with($notification);
           }
            $data['image']=$oldimage;
             DB::table('posts')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully Post update',
            'alert-type'=>'success'
             );
            return Redirect()->route('all.post')->with($notification);
    }
    public function getsubcategory($category_id)
     {
     	$sub=DB::table('sub_categories')->where('category_id',$category_id)->get();
     	return response()->json($sub);
     }
        public function getdistrict($division_id)
     {
     	$div=DB::table('districts')->where('division_id',$division_id)->get();
     	return response()->json($div);
     }

}



