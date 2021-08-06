@extends('layouts.success')


@section('title')
    Success Page
@endsection

@section('content')

<div class="page-content page-success">
            <div class="section-success" data-aos="zoom-in">
                <div class="container">
                    <div
                        class="row align-items-center row-login justify-content-center"
                    >
                        <div class="col-lg-6 text-center">
                            <img
                                src="images/success.svg"
                                alt=""
                                class="mb-4"
                            />
                            <h2>
                                Transaksi Berhasil.
                            </h2>
                            <p>
                                Silahkan hubungi laboran untuk mengambil barang yang dipinjam
                                <br />
                                kami akan menginformasikan resi secepat mungkin!
                            </p>
                            <div>
                            @php 
                      $roles = Auth::user()->roles;
                      // dd($roles);
                    @endphp 

                    @if ($roles == 'ADMIN')
                      <a class="btn btn-success w-50 mt-4" href="{{ route('admin-dashboard') }}"
                        >Dashboard</a
                      > 
                    @else
                      <a class="btn btn-success w-50 mt-4" href="{{ route('dashboard') }}"
                        >Dashboard</a
                      > 
                    @endif
                                <a
                                    class="btn btn-signup w-50 mt-2"
                                    href="{{ route('home') }}"
                                >
                                    Kembali ke Halaman Utama
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection