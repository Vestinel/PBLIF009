@extends('layouts.admin')


@section('title')
    Transactions
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">
                Edit Transactions
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('transactions.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ $item->id }}" disabled>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control" value="{{ $item->user->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Total Produk</label>
                                            <input type="text" name="total_product" class="form-control" value="{{ $item->total }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Borrow Date</label>
                                            <input type="text" name="borrow_date" class="form-control" value="{{ $item->borrow_date }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Return Date</label>
                                            <input type="text" name="return_date" class="form-control" value="{{ $item->return_date }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Produk</th>
                                                        <th>Gambar</th>
                                                        <th>Total Produk</th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaction_details as $detail)
                                                    <tr>
                                                        <td>
                                                            {{ $detail->product->name }}
                                                        </td>
                                                        <td>
                                                            
                                                            <img
                                                                src="{{ Storage::url($detail->product->galleries->first()->photos) ?? '' }}"
                                                                class="w-50"/>
                                                        </td>
                                                        <td>{{ $detail->total }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="transaction_status" class="form-control">
                                            <option value={{ $item->transaction_status }} selected>{{ $item->transaction_status }}</option>
                                                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                                <option value="dipinjam">dipinjam</option>
                                                <option value="Kembali">Kembali</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success px-5">
                                            Save now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection