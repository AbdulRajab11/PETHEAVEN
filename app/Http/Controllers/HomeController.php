<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <- ini penting

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get();
        return view('home', compact('products'));
    }
}
