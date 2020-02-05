<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Mail;
use App\Models\Product;
class CartController extends Controller
{
    public function getAddCart($id){
    	$Product = Product::find($id);
    	Cart::add(['id' => $id, 'name' => $Product->prod_name, 'quantity' => 1, 'price' => $Product->prod_price , 'attributes'=>['img'=>$Product->prod_img]]);  	
    	
       // foreach (Cart::getContent() as $product){
       //  echo "Id: $product->id</br>";
       //  echo "Name: $product->name</br>";
       //  echo "Price: $product->price</br>";
       //  echo "Quantity: $product->quantity</br>";
       //  echo "Img: $product->array->img</br>";
       //  }
    	return redirect('cart/show');
    }
    public function getShowCart(){
        $data['total']=Cart::getTotal();
        $data['carts']=Cart::getContent();
        return view('frontend.cart',$data);
    }
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::clear();
        }
        else {
            Cart::remove($id);
        }
        return back();

    }
    public function getUpdateCart(request $request){
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);
    }
    public function postCompleteCart(request $request)
    {
        $data['carts']=Cart::getContent();
        $data['info']=$request->all();
        $data['total']=Cart::getTotal();
        $email=$request->email;
        Mail::send('frontend.email', $data, function ($message) use ($email) {
            $message->from('vinhpr123@gmail.com', 'KVStore');
                   
            $message->to($email, $email);
        
            $message->cc('vinhpr123@gmail.com', 'KVStore');
                    
            $message->subject('Xác nhận đơn hàng');        
            
        });
        Cart::clear();
        return redirect('cart/complete');
    }
    public function getCompleteCart(){
        return view('frontend.complete');
    }
}
