<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TroubleshootArticle;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class TroubleshootDetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product =  TroubleshootArticle::with(['galleries','user'])->where('slug', $id)->firstOrFail();

        return view('pages.troubleshoot-detail',[
            'product' => $product
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request, $id)
    {
       
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
