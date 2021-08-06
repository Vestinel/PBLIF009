<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

use App\TransactionDetail;


class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->whereHas('transaction', function($transaction){
                                $transaction->where('users_id', Auth::user()->id);
                            });

        $belum = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->whereHas('transaction', function($transaction){
                                $transaction->where('users_id', Auth::user()->id)
                                ->where('transaction_status', 'Mahasiswa');
                            });

        return view('pages.dashboard',[
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->orderBy('id','DESC')->get(),
            'belum' => $belum->count(),
        ]);
        
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->findOrFail(4);

        return view('pages.dashboard-transactions-details',[
            'transaction' => $transaction,
        ]);
        
    }

}
