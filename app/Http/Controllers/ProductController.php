<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::all();

        return view('public.home', compact('categories', 'products'));
    }

    public function product(Product $product, $slug)
    {
        return view('public.products.view', compact('product'));
    }

    public function shop()
    {

    }
}
