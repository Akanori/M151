<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getTotal()
    {
        $cart = session()->get('cart');

        $total = 0;

        foreach ($cart as $prod) {
            $total += $prod->price * $prod->count;
        }
        return $total;
    }
    public function cart()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            $total = $this->getTotal();

            return view('cart', ['cart' => $cart, 'total' => $total]);
        } else {
            return redirect('/products');
        }
    }

    public function loadCart()
    {
        if (session()->has('cart')) {
            return session()->get('cart');
        } else {
            return $cart = [];
        }
    }

    public function addtocart($id)
    {
        $cart = $this->loadCart();
        $product = \App\Models\Product::find($id);

        $checker = false;
        foreach ($cart as $prod) {
            if ($product->id == $prod->id) {
                $prod->count++;
                $checker = true;
                break;
            }
        }

        if (!$checker) {
            $product->count = 1;
            array_push($cart, $product);
        }

        session()->put('cart', $cart);
        return redirect('/products');
    }

    public function order()
    {
        if (session()->has('cart') || session()->has('userId')) {
        $cart = session()->get('cart');

        $total = $this->getTotal();
        
            $id = session()->get('userId');
            $user = \App\Models\User::find($id);

            return view('order', ['cart' => $cart, 'total' => $total, 'user' => $user]);
        } else {
            return redirect('/products');
        }
    }

    public function completeOrder()
    {
        $order = new \App\Models\Order;

        $order->fk_user_id = session()->get('userId');
        $order->total = $this->getTotal();
        $insert = $order->save();
        if ($insert) {
            session()->forget('cart');
            echo '<script>alert("Bestellung Abgeschlossen!")</script>';
        }
    }
}
