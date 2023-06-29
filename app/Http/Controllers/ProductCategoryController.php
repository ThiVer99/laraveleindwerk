<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productcategories = ProductCategory::withTrashed()->Paginate(10);
        return view('admin.productcategories.index', compact('productcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.productcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ],
            [
                'name.required' => 'category name is required',
                'description.required' => 'description is required',
            ]);
        ProductCategory::create($request->all());
        return redirect()->route('productcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productcategory = ProductCategory::findOrFail($id);
        return view('admin.productcategories.edit', compact('productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ],
            [
                'name.required' => 'category name is required',
                'description.required' => 'description is required',
            ]);
        $productcategory = ProductCategory::findOrFail($id);
        $productcategory->update($request->all());
        return redirect('admin/productcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            ProductCategory::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product category not found.'], 404);
        }

        return redirect()->route('productcategories.index')->with([
            'alert' => [
                'message' => 'Product category deleted!',
                'type' => 'danger'
            ]
        ]);
    }
    public function productCategoryRestore($id){
        try {
            ProductCategory::onlyTrashed()->where('id', $id)->restore();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product category not found.'], 404);
        }

        return redirect()->route('productcategories.index')->with([
            'alert' => [
                'message' => 'Product category restored!',
                'type' => 'success'
            ]
        ]);
    }
}
