<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TroubleshootCategories;
use App\TroubleshootArticle;

class TroubleshootController extends Controller
{
    public function index()
    {
        $categories = TroubleshootCategories::take(6)->get();
        $article = TroubleshootArticle::with(['galleries'])->take(8)->get();
        
        return view('pages.troubleshoot', [
            'categories'=> $categories,
            'article' => $article
        ]);
        
    }
}
