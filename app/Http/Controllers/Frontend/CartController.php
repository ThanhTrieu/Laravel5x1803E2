<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function addCart($id, Request $request, Product $pd)
    {
    	// lay ra thong tin chi tiet cua san pham
    	$id = is_numeric($id)? $id : 0;
    	$infoPd = $pd->getDataById($id);
    	if(is_object($infoPd) && $infoPd != null){
    		$infoPd = $infoPd-> toArray();
    	}

    	if($infoPd){
    		// add vao gio hang
    		Cart::add([
    			'id' => $infoPd['id'],
    			'name' => $infoPd['name'],
    			'price' => $infoPd['price'],
    			'quantity' => 1,
    			'attributes' => [
    				'img' => $infoPd['images'],
    				'des' => $infoPd['description']
    			]
    		]);
    		// quay ve trang show cart
    		return redirect()->route('frontend.showcart');
    	} else {
    		abort(404);
    	}
    }

    public function showCart()
    {
    	// xem da lay dc thong tin tu gio hang
    	$cart = Cart::getContent();
    	return view('frontend.cart.showcart',['cart' => $cart]);
    }

    public function deleteCart($id, Request $request)
    {
    	Cart::remove($id);
    	return redirect()->route('frontend.showcart');
    }

    public function updateCart($id = null, $qty = null, Request $request)
    {
    	Cart::update($id, array(
		  'quantity' => array(
		      'relative' => false,
		      'value' => $qty
		  ),
		));
		
    	return redirect()->route('frontend.showcart');
    }
}
