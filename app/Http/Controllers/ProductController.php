<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::latest()
            ->paginate(6);

        return view('humz', [
            'Products' => $Products
        ])
            ->with('user', Auth::user());
    }

    public function show()
    {
        return view('product_Detail');
    }
}
