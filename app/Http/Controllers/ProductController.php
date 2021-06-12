<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function home()
    {
        if (Cache::has('homeCategories')) {
            $categories = Cache::get('homeCategories');
        }
        else {
            $categories = Category::orderBy('name', 'ASC')->get();
            Cache::put('homeCategories', $categories, 86400);
        }

        $products = Product::with(['media', 'brand', 'categories'])->get();

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
