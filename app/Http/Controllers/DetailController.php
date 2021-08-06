<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product =  Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();

        return view('pages.detail',[
            'product' => $product
        ]);
    }

    public function addByQr($id)
    {
        $data = [
            'products_id' => Product::where('slug', $id)->value('id'),
            'users_id' => Auth::user()->id,
        ];

        $cart = Cart::where('users_id', Auth::user()->id)
                ->where('products_id', $data['products_id'])->first();

        if ($cart){
            $cart->total = $cart->total + 1 ;
            $cart->save();
        } else {
            Cart::create($data);
        }

        return redirect()->route('cart');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add($id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        $cart = Cart::where('users_id', Auth::user()->id)
                ->where('products_id', $id)->first();

        if ($cart){
           $cart->total = $cart->total + 1 ;
           $cart->save();
        } else {
            Cart::create($data);
        }

        return redirect()->route('cart');
    }
}
