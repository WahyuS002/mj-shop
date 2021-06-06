<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategoryResource(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $category->addMediaFromRequest('picture')
                ->toMediaCollection('category_images');
        }

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category->picture = (isset($category->media[0])) ?  $category->media[0]->getFullUrl()
            : asset('assets/img/400x300.jpg');
        unset($category->media);

        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $request->validated();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            if (isset($category->media[0])) {
                $category->media[0]->delete();
            }

            $category->addMediaFromRequest('picture')
                ->toMediaCollection('category_images');
        }

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (isset($category->media[0])) {
            $category->media[0]->delete();
        }

        $category->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil menghapus data'
            ]);
    }
}
