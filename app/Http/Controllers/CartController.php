<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Logo;
use Cart;

class CartController extends Controller {

    //
    public function addToCart(Request $request) {
        $productId = $request->productId;
        $productQuantity = $request->productQuantity;

        $productToCart = Product::where('id', $productId)->first();

        $data['id'] = $productToCart->id;
        $data['name'] = $productToCart->productName;
        $data['price'] = $productToCart->productPrice;
        $data['qty'] = $productQuantity;
        $data['options']['image'] = $productToCart->productImage;
//        Cart::destroy();
        Cart::add($data);

        return back()
                ->with('message', 'Product added to cart.');
    }
    
    public function updateQuantity(Request $request) {
        $rowId = $request->productId;
        $qty = $request->productQuantity;
        Cart::update($rowId, $qty);
        return back();
    }
    
    public function deleteCartContent($rowId) {
        Cart::remove($rowId);
        return redirect('/cart');
    }
    
    public function deleteAllCartContents() {
        Cart::destroy();
        return back();
    }

}
