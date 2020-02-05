<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Comment;
class FrontendController extends Controller
{
    public function getHome(){    	
    	$data['featured']=Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
    	//dd($data['featured']);
    	$data['new']=Product::orderBy('prod_id','desc')->take(8)->get();
    	return view('frontend.home',$data);
    }
    public function getDetails($id){
        $data['comment']=Comment::where('com_product',$id)->get();
    	$data['item']=Product::find($id);    	
    	return view('frontend.details',$data);
    }
    public function getCategory($id){
    	$data['catename']=Categories::find($id);
    	$data['items']=Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(4);
    	return view('frontend.category',$data);
    }
    public function postComment(Request $request, $id){
        $Comment = new Comment;      
        
        $Comment->com_email=$request->email;
        $Comment->com_name=$request->name;        
        $Comment->com_content=$request->content;
        $Comment->com_product=$id;
        $Comment->save();
        return back();

    }
    public function getSearch(Request $request){
        $result = $request->result;
        $result= str_replace(' ','%',$result);
        $data['items']=Product::where('prod_name','like','%'.$result.'%')->paginate(2);;
        $data['search']=$result;
       // dd($result);
        return view ('frontend.search',$data);
    }
}
 