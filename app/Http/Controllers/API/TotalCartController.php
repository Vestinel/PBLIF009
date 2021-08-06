<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

use App\Cart;

class TotalCartController extends Controller
{
    public function totalCart(Request $request){

        $id = $request->id;
        $total = $request->total;
        $user_id = $request->user_id;
        

        Cart::findOrFail($id)
          ->where('id', $id)
          ->where('users_id', $user_id)
          ->update(['total' => $total]);

        return 'ok';
    }
}
