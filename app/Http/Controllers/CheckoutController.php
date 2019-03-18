<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::content()->count() == 0)
        {
            Session::flash('info', 'Your cart is empty, please shop first.');
            return redirect()->route('index');
        }
        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey('sk_test_2gXNynLaqeumCIFbmYLNOMeA');

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'eShop Shopping Charge',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Payment Successful, Please wait for our conformation email. Thanks..');
        Cart::destroy();
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
        return redirect()->route('index');
    }

}
