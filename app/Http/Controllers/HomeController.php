<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->get();
        
        // $dira = QrCode::generate('PPK/ARDUINO/001')


        return view('pages.home', [
            'categories'=> $categories,
            'products' => $products
        ]);

        
    }
}
