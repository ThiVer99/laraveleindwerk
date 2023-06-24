<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class AdminGendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $genders = Gender::withTrashed()->paginate(10);
        return view('admin.genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.genders.create');
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
           'name' => 'required'
        ],[
            'name.required' => 'Please enter a name'
        ]);
        Gender::create($request->all());
        return redirect()->route('genders.index');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $gender = Gender::findOrFail($id);
        return view('admin.genders.edit',compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Please enter a name'
        ]);

        $gender = Gender::findOrFail($id);
        $gender->update($request->all());
        return redirect()->route('genders.index')->with([
            'alert' => [
                'message' => ' updated!',
                'type' => 'warning'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $gender = Gender::findOrFail($id);
            $gender->products()->delete();
            $gender->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'gender not found.'], 404);
        }

        return redirect()->route('genders.index')->with([
            'alert' => [
                'message' => ' deleted!',
                'type' => 'danger'
            ]
        ]);
    }
    public function genderRestore($id){
        try {
            $gender = Gender::onlyTrashed()->where('id', $id)->first();
            $gender->products()->onlyTrashed()->restore();
            $gender->restore();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'gender not found.'], 404);
        }

        return redirect()->route('genders.index')->with([
            'alert' => [
                'message' => ' restored!',
                'type' => 'success'
            ]
        ]);
    }
}
