<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class AdminSizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sizes = Size::paginate(10);
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|integer|min:1'
        ], [
            'name.required' => 'Please enter a shoe size',
            'name.integer' => 'Please enter a number',
            'name.min:1' => 'Please enter a number that is 1 or higher',
        ]);
        Size::create($request->all());
        return redirect()->route('sizes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.sizes.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|integer|min:1'
        ], [
            'name.required' => 'Please enter a shoe size',
            'name.integer' => 'Please enter a number',
            'name.min:1' => 'Please enter a number that is 1 or higher',
        ]);
        $size = Size::findOrFail($id);
        $size->update($request->all());
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
