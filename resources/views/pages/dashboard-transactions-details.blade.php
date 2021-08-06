@extends('layouts.dashboard')


@section('title')
    Dashboard Transactions Details
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Transaction</h2>
        <p class="dashboard-subtitle">
            Transaction Details
        </p>
        </div>
        <div class="dashboard-content" id="transactionDetails">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                    <img
                        src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                        alt=""
                        class="w-100 mb-3"
                    />
                    </div>
                    <div class="col-12 col-md-8">
                    <div class="row">
                        <div class="col-12 col-md-6">
                        <div class="product-title">Customer Name</div>
                        <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="product-title">Product Name</div>
                        <div class="product-subtitle">
                            {{ $transaction->product->name }}
                        </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-title">
                                Borrow Date
                            </div>
                            <div class="product-subtitle">
                                {{ $transaction->transaction->borrow_date }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="product-title">
                                Return Date
                            </div>
                            <div class="product-subtitle">
                                {{ $transaction->transaction->return_date }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                        <div class="product-title">Status</div>
                        <div class="product-subtitle text-danger">
                            {{ $transaction->transaction->transaction_status }}
                        </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="product-title">Total Amount</div>
                        <div class="product-subtitle">{{ $transaction->total }}</div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection

@push('addon-scripts')
    <script src="vendor/vue/vue.js"></script>
    <script>
        var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
            status: "SHIPPING",
            resi: "BDO12308012132",
        },
        });
    </script>
@endpush