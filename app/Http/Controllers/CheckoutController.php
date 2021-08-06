<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $user->update($request->except('total_product'));

        //proses checkout

        $carts = Cart::with(['product','user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        

        // $test = $request->all();
                    
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'total' => $request->total_product,
            // 'total' => (int) $request->total_product,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'transaction_status' => 'Menunggu Verifikasi',
        ]);

        foreach ($carts as $cart){
            
            TransactionDetail::create([
                'transactions_id' =>$transaction->id,
                'products_id' => $cart->product->id,
                'total' => $cart->total,
                'transaction_status' => 'Menunggu Verifikasi',
            ]);

        }

        // delete cart data
        Cart::where('users_id', Auth::user()->id)->delete();
        

        return redirect('/success');
    }

}
