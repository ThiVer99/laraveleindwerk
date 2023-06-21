<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class AdminColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colors = Color::withTrashed()->paginate(10);
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Please enter a name'
        ]);
        Color::create($request->all());
        return redirect()->route('colors.index');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $color = Color::withTrashed()->findOrFail($id);
        return view('admin.colors.edit',compact('color'));
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
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Please enter a name'
        ]);

        $color = Color::withTrashed()->findOrFail($id);
        $color->update($request->all());
        return redirect()->route('colors.index')->with([
            'alert' => [
                'message' => ' updated!',
                'type' => 'warning'
            ]
        ]);
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
            Color::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'color not found.'], 404);
        }

        return redirect()->route('colors.index')->with([
            'alert' => [
                'message' => ' deleted!',
                'type' => 'danger'
            ]
        ]);
    }
    public function colorRestore($id){
        try {
            Color::onlyTrashed()->where('id', $id)->restore();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'brand not found.'], 404);
        }

        return redirect()->route('colors.index')->with([
            'alert' => [
                'message' => ' restored!',
                'type' => 'success'
            ]
        ]);
    }
}
