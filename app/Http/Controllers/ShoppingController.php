<?php

namespace App\Http\Controllers;

use Session;
use Cart;
Use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function addToCart()
    {
        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id'    => $pdt->id,
            'name'  => $pdt->name,
            'price' => $pdt->price,
            'qty'   => request()->qty
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        
        Session::flash('success', 'Product Added to Cart.');
        return redirect()->route('cart');
    }

    public function rapidAdd($id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id'    => $pdt->id,
            'name'  => $pdt->name,
            'price' => $pdt->price,
            'qty'   => 1
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        
        Session::flash('success', 'Product Added to Cart.');
        return redirect()->route('cart');
    }

    public function cart()
    {
        //Cart::destroy();
        return view('cart');
    }


    public function incriment($id, $qty)
    {
        Cart::update($id, $qty + 1);
        return redirect()->back();
    }

    public function decriment($id, $qty)
    {
        Cart::update($id, $qty - 1);
        return redirect()->back();
    }

    public function cartDelete($id)
    {
        Cart::remove($id);
        Session::flash('success', 'Product Deleted Successfully.');
        return redirect()->back();
    }
}
