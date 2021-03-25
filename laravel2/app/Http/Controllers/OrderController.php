<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cart(){
        $cart = session()->get('cart');

        return view('cart', ['cart' => $cart]);
    }

    public function loadCart(){
        if(session()->has('cart')){
            return session()->get('cart');
        }
        else{
            return $cart = [];
        }
    }

    public function addtocart($id){
        $cart = $this->loadCart();
        $product = \App\Models\Product::find($id);

        $checker = false;
        foreach($cart as $prod) {
            if ($product->id == $prod->id) {
                $prod->count ++;
                $checker = true;
                break;
            }
        }

        if(!$checker){
            $product->count = 1;
            array_push($cart, $product);
        }

        session()->put('cart', $cart);
        return redirect('/products');
    }
}
