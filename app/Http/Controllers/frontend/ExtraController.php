<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Categories;
use App\Subcategories;
class ExtraController extends Controller
{
   public function allpostcat($id,$category_bn)
        {
             $post=DB::table('posts')
            ->join('users','posts.user_id','users.id')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','users.name','categories.category_bn')
            ->where('category_id',$id)->orderBy('id','DESC')->paginate(16);
            return view('fronend.subindex',compact('post'));
        }
          public function allpost($id)
        {
             $post=DB::table('posts')
                 ->join('users','posts.user_id','users.id')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','users.name','categories.category_bn')
            ->where('category_id',$id)->orderBy('id','DESC')->paginate(16);
            $category =  Categories::find($id);
           $subcategories= Categories::find($id)->subcategories;
            
 
            return view('fronend.subindex',compact('post'))->withCategory($category)->withSubcategories($subcategories);
}

        public function singlepost($id,$slug)
        {
        $post=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            // ->join('subcategories','posts.subcategory_id','subcategories.id')
            ->join('users','posts.user_id','users.id')
            ->select('posts.*','categories.category_bn','categories.category_en','users.name')
           ->where('posts.id',$id)
           ->first();

       return view('fronend.singlepost',compact('post'));
        }

        public function search()
        {
            return view('fronend.serach');
        }
 public function getdistrict($division_id)
     {
        $div=DB::table('districts')->where('division_id',$division_id)->get();
        return response()->json($div);
     }
     public function allnews(Request $request)
     {
        $div=$request->division_id;
        $dis=$request->district_id;
         $post=DB::table('posts')
            ->where('division_id',$div)
            ->where('district_id',$dis)
            ->orderBy('id','DESC')->paginate(16);
        return view('fronend.serach',compact('post'));

     }
}
