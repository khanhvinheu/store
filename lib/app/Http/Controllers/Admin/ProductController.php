<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Categories;
use DB;
class ProductController extends Controller
{
    public function getProduct(){
    	$data['productlist']=DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
    	return view('backend.product',$data);
    }
    public function getAddProduct(){
    	$data['catelist']= Categories::all();
    	return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request){
    	$Product = new Product;
    	$filename=$request->img->getClientOriginalName();
    	$Product->prod_name = $request->name;
    	$Product->prod_slug = str_slug($request->name);
    	$Product->prod_img=$filename;
    	$Product->prod_accessories = $request->accessories;
    	$Product->prod_price = $request->price;
    	$Product->prod_warranty = $request->warranty;
    	$Product->prod_promotion = $request->promotion;
    	$Product->prod_condition = $request->condition;
    	$Product->prod_status = $request->status;
    	$Product->prod_discription = $request->description;
    	$Product->prod_cate = $request->cate;
    	$Product->prod_featured = $request->featured;     		
    	$request->img->storeAs('avatar',$filename);  
        $Product->save();    	
    	return back();
    }

    public function getEditProduct($id){
    	$data['catelist']= Categories::all();
    	$data['product'] = Product::find($id);    	
    	return view('backend.editproduct',$data);
    }
    public function postEditProduct(Request $request , $id){
    	$Product= new Product;
    	$arr['prod_name'] = $request->name;  
    	$arr['prod_slug'] = str_slug($request->name);   	
    	$arr['prod_accessories'] = $request->accessories;
    	$arr['prod_price'] = $request->price;
    	$arr['prod_warranty'] = $request->warranty;
    	$arr['prod_promotion'] = $request->promotion;
    	$arr['prod_condition'] = $request->condition;
    	$arr['prod_status'] = $request->status;
    	$arr['prod_discription'] = $request->description;
    	$arr['prod_cate'] = $request->cate;
    	$arr['prod_featured'] = $request->featured;    	
    	if($request->hasFile('img')){
            $file = $request->img;
    		$img = $request->img->getClientOriginalName();
    		$arr['prod_img']=$img;
    		$file->move('lib/storage/avatar/',$img);
    	}
    	$Product::where('prod_id',$id)->update($arr);
    	return redirect('admin/product');
    }

    public function getDeleteProduct($id){
    	Product::destroy($id);
    	return back();
    }
    
}
