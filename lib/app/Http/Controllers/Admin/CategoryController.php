<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Str;
class CategoryController extends Controller
{
    public function getCate(){
    	$data['catelist']= Categories::all();
    	return  view ('backend.category',$data );
    }
    public function postCate(AddCateRequest $request)
    {
    	$Categories = new Categories;
    	$Categories->cate_name=$request->name;
    	$Categories->cate_slug=str_slug($request->name);
    	$Categories->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['catename'] = Categories::find($id);
    	return  view ('backend.editcategory',$data);
    }
    public function postEditCate(EditCateRequest $request,$id){
    	$Categories= Categories::find($id);
    	$Categories->cate_name=$request->name;
    	$Categories->cate_slug=str_slug($request->name);
    	$Categories->save();
    	return  redirect()->intended('admin/category');
    }
    public function getDeleteCate($id){
    	Categories::destroy($id);
    	return back();
    }
}
