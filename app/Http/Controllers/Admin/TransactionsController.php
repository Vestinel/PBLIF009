<?php

namespace App\Http\Controllers\Admin;

use App\Transaction;
use App\TransactionDetail;


use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Admin\TransactionRequest;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Transaction::with(['user']);
            return Datatables::of($query)
                ->addcolumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('transactions.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                </div>
                            </div>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.transaction.index');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::with(['transaction.user','product.galleries'])
                                ->where('transactions_id', $id);
                                

        // $transaction_details = TransactionDetail::with(['transaction.user','product.galleries'])
        //                         ->where('transactions_id', $id)
        //                         ->whereHas('transaction', function($transaction){
        //                             $transaction->where('users_id', Auth::user()->id);
        //                         });

        return view('pages.admin.transaction.edit', [
            'item' => $item,
            'transaction_details' => $transaction_details->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data['transaction_status'] = $request->transaction_status;

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
