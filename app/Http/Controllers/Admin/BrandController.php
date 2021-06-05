<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $request->validated();

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $brand->addMediaFromRequest('picture')
                ->toMediaCollection('brand_images');
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil menambah data brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $request->validated();

        $brand->name = $request->brand_name;
        $brand->description = $request->brand_description;
        $brand->save();

        if ($request->has('brand_picture') && $request->file('brand_picture')->isValid()) {
            if (isset($brand->media[0])) {
                $brand->media[0]->delete();
            }

            $brand->addMediaFromRequest('brand_picture')
                ->toMediaCollection('brand_images');
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui data brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (isset($brand->media[0])) {
            $brand->media[0]->delete();
        }
        $brand->delete();

        return redirect()
            ->route('admin.products.brands.index')
            ->withSuccess('Berhasil menghapus brand');
    }
}
