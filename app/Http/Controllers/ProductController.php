<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\allProducts;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }
    function detail($id)
    {
        $data = Product::findorfail($id);
        return view('detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }
    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/allproducts');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $userId = Session()->get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    function cartList(Request $req)
    {
        if ($req->session()->has('user')) {
            $userId = Session()->get('user')['id'];
            $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->select('products.*', 'cart.id as cart_id')
                ->get();
            return view('cartlist', ['products' => $products]);
        } else {
            return redirect('/login');
        }
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }
    function buyNow(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/cartlist');
        } else {
            return redirect('/login');
        }
    }
    function orderNow()
    {

        $userId = Session()->get('user')['id'];
        $products  = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');

        $total = $products;
        return view('ordernow', ['total' => $total]);
    }
    function orderPlace(Request $req)
    {
        // dd($req->all());
        $userId = Session()->get('user')['id'];
        $product  = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
        $total = $product + 10;
        $allCart = Cart::where('user_id', $userId)->get();
        $cartArray = [];
        foreach ($allCart as $key => $cart) {
            // dd($cart->product_id);
            $cartArray[] = [
                'product_id' => $cart->product_id,
                'user_id' => $cart->user_id,
                'status' => 'pending',
                'payment_method' => 'method',
                'payment_status' => 'method',
                'address' => $req->address,
                'total_bill' => $total,
            ];
        }
        DB::table('orders')->insert($cartArray);
        //$req->session()->push('total', $total);
        session(['total' => $total]);
        Cart::where('user_id', $userId)->delete();
        $req->input();
        return view('stripe');
    }

    function myOrders(Request $req)
    {
        if ($req->session()->has('user')) {
            $userId = Session()->get('user')['id'];
            $orders  = DB::table('orders')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->where('orders.user_id', $userId)
                ->get();
            return view('myorders', ['orders' => $orders]);
        } else {
            return redirect('/login');
        }
    }
    function allProducts()
    {
        $data = Product::all();
        return view('allProducts', ['products' => $data]);
    }
    function admin(Request $req)
    {

        $userId = Session()->get('user')['id'];
        if ($userId == 3) {
            $data = Product::all();
            return view('admin', ['products' => $data]);
        } else {
            return "Only accessible to Admin";
        }
    }
    function removeProduct($id)
    {
        Product::destroy($id);
        return redirect('/admin');
    }

    function upload(Request $req)
    {
        $userId = Session()->get('user')['id'];
        if ($userId == 3) {
            $products = new Product;

            $products->name = $req->name;
            $products->price = $req->price;
            $products->category = $req->category;
            $products->description = $req->description;
            // $products->gallery = $req->gallery;
            // dd($req->image ? 'true' : 'fa;se');
            if ($image = $req->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $products->gallery = $profileImage;
            }
            $products->save();
            return redirect('/admin');
        }
    }
}
