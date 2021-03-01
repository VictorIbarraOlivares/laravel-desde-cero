<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        \DB::connection()->enableQueryLog();

        $products = Product::with('images')->get();
        return view('welcome')->with([
            'products' => $products
        ]);
    }
}
