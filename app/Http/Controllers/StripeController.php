<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\allProducts;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Stripe;

class StripeController extends Controller
{

    public function stripe()
    {
        $total = session('total');
        return view('stripe', ['total' => $total]);
    }
    public function process(Request $req)
    {

        $stripe = Stripe::charges()->create([
            'source' => $req->get('tokenId'),
            'currency' => 'USD',
            'amount' => $req->get('amount') * 100
        ]);
        $userId = Session()->get('user')['id'];
        $products  = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
        $total = $products;
        $payments = new Payment;
        $payments->s_payment_id = $req->get('tokenId');
        $payments->user_id = $userId;
        $payments->product_id = 1;
        $payments->amount = $req->$total;
        $payments->save();
        return redirect('/thankyou');


        //return $stripe;
    }
}
