<?php

namespace App\Http\Controllers\Web\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class CartController extends Controller
{
    public function AddCart(Request $request)
    {
    	$product_id = $request->input('product_id');
    	$quantity = $request->input('quantity');
    	$color = $request->input('color');

    	 try{
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }


        // session(['aa'=>'123']);
        
       	$item = [
		    $product_id => [
		         'quantity' => $quantity,
		         'color' => $color,
		     ],
		];


        if (Session::has('cart') && !empty(Session::get('cart'))) {
        	$cart = Session::get('cart');
        	$cart[$product_id] =[
		         'quantity' => $quantity,
		         'color' => $color,
		     ];
        }else{
        	$cart = $item;
        }

        Session::put('cart', $cart);
        Session::save();


        // dd(session()->all());
       // Session::forget('cart.'.$product_id);

        dd(Session::get('cart'));
    }
}
