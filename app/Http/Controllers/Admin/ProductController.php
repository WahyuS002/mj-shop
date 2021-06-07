<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_order_option;
use App\Models\Product_specification;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();

        $product = new Product();
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->is_available = ($request->is_available == 1) ? TRUE : FALSE;
        $product->save();

        $specifications = $request->specs;
        if (is_array($specifications) && count($specifications) > 0) {
            $insertSpecifications = [];
            $n = 0;

            foreach ($specifications as $specification) {
                if (!empty($specification['key']) && !empty($specification['value'])) {
                    $insertSpecifications[$n] = [
                        'product_id' => $product->id,
                        'key' => $specification['key'],
                        'value' => $specification['value']
                    ];
                }

                $n++;
            }

            if (count($insertSpecifications) > 0) {
                Product_specification::insert($insertSpecifications);
            }
        }

        $orderOptions = $request->options;
        if (is_array($orderOptions) && count($orderOptions) > 0) {
            $insertOptions = [];
            $n = 0;

            foreach ($orderOptions as $option) {
                if (!empty($option['key']) && !empty($option['value'])) {
                    $insertOptions[$n] = [
                        'product_id' => $product->id,
                        'key' => $option['key'],
                        'value' => $option['value']
                    ];
                }

                $n++;
            }

            if (count($insertSpecifications) > 0) {
                Product_order_option::insert($insertOptions);
            }
        }

        $categories = $request->categories;
        if (is_array($categories) && count($categories) > 0) {
            $product->categories()->sync($categories);
        }

        if (is_array($request->pictures) && count($request->pictures) > 0) {
            $product->addMultipleMediaFromRequest(['pictures'])
                ->each(function ($picture) {
                    $picture->toMediaCollection('product_pictures');
                });
        }

        return redirect()
            ->to(route('admin.products.index'))
            ->withSuccess('Berhasil menambahkan produk baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.edit', compact('brands', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();

        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->is_available = ($request->is_available == 1) ? TRUE : FALSE;
        $product->save();

        $specifications = $request->specs;
        if (is_array($specifications) && count($specifications) > 0) {
            $product->specifications()->delete();

            $insertSpecifications = [];
            $n = 0;

            foreach ($specifications as $specification) {
                if (!empty($specification['key']) && !empty($specification['value'])) {
                    $insertSpecifications[$n] = [
                        'product_id' => $product->id,
                        'key' => $specification['key'],
                        'value' => $specification['value']
                    ];
                }

                $n++;
            }

            if (count($insertSpecifications) > 0) {
                Product_specification::insert($insertSpecifications);
            }
        }

        $orderOptions = $request->options;
        if (is_array($orderOptions) && count($orderOptions) > 0) {
            $product->orderOptions()->delete();

            $insertOptions = [];
            $n = 0;

            foreach ($orderOptions as $option) {
                if (!empty($option['key']) && !empty($option['value'])) {
                    $insertOptions[$n] = [
                        'product_id' => $product->id,
                        'key' => $option['key'],
                        'value' => $option['value']
                    ];
                }

                $n++;
            }

            if (count($insertSpecifications) > 0) {
                Product_order_option::insert($insertOptions);
            }
        }

        $categories = $request->categories;
        if (is_array($categories) && count($categories) > 0) {
            $product->categories()->sync($categories);
        }

        $pictureToDelete = $request->_delete_picture_id;
        if ( ! empty($pictureToDelete)) {
            $pictures = explode(',', $pictureToDelete);
            if (is_array($pictures) && count($pictures) > 0) {
                foreach ($pictures as $picture) {
                    $product->media[$picture]->delete();
                }
            }
        }

        if (is_array($request->pictures) && count($request->pictures) > 0) {
            $product->addMultipleMediaFromRequest(['pictures'])
                ->each(function ($picture) {
                    $picture->toMediaCollection('product_pictures');
                });
        }

        return redirect()
            ->to(route('admin.products.show', $product->id))
            ->withSuccess('Berhasil memperbarui data produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->back()
            ->withSuccess('Berhasil menghapus produk');
    }
}
