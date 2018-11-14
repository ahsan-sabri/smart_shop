<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
use App\Customer;

class CheckoutController extends Controller {

    //
    public function showCartContents() {
        $cartContents = Cart::content();
        return $cartContents;
    }

    public function index() {
        return view('frontEnd.checkout.checkoutContent')
                        ->with('cartItems', $this->showCartContents());
        
    }

    public function customerRegistration(Request $request) {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->mobile = $request->mobile;
        if ($request->password == $request->confirmPassword) {
            $customer->password = bcrypt($request->password);
        } else {
            return back()->with('message', 'Password not matched!');
        }
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        return redirect('checkout/shipping');
    }

    public function showShippingItem() {
        $customerId = Session::get('customerId');
        $customerInfoById = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkout.shippingContent', ['customer' => $customerInfoById])
                        ->with('cartItems', $this->showCartContents());
    }

}
