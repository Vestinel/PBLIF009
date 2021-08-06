<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TroubleshootCategories;
use App\TroubleshootArticle;

class TroubleshootCategoriesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = TroubleshootCategories::all();
        $products = TroubleshootArticle::with(['galleries'])->paginate(32);
        
        return view('pages.category', [
            'categories'=> $categories,
            'products' => $products
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $slug)
    {
        $categories = TroubleshootCategories::all();
        $category = TroubleshootCategories::where('slug', $slug)->firstOrFail();
        $products = TroubleshootArticle::with(['galleries'])->where('categories_id', $category->id)->paginate(32);
        
        return view('pages.troubleshoot-category', [
            'categories'=> $categories,
            'products' => $products
        ]);
    }
}
