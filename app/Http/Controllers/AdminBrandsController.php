<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AdminBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands=Brand::withTrashed()->paginate(10);
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
        return view('admin.brands.create');
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
//        Brand::create($request->all());
//        return redirect()->route('brands.index');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $brand = Brand::create($request->all());

        return redirect()->route('brands.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        try {
            Brand::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'brand not found.'], 404);
        }

        return redirect()->route('brands.index')->with([
            'alert' => [
                'message' => ' deleted!',
                'type' => 'danger'
            ]
        ]);
    }

    public function brandRestore($id){
        try {
            Brand::onlyTrashed()->where('id', $id)->restore();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'brand not found.'], 404);
        }

        return redirect()->route('brands.index')->with([
            'alert' => [
                'message' => ' restored!',
                'type' => 'success'
            ]
        ]);
    }
}
