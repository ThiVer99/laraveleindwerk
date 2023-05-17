<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Keyword;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        $products = Product::with(['keywords','photo','brand','productcategories'])->paginate(10);
        return view('admin.products.index',compact('products', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $keywords = Keyword::all();
        $productcategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('keywords', 'productcategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name'=> ['required','between:3,255'],
            'keywords' => ['required', Rule::exists('keywords', 'id')],
            'body'=>'required',
            'gender' => 'required|min:1'
        ],
            [
                'name.required'=> 'Product name is required',
                'title.between' => 'Product name between 3 and 255 characters required',
                'body.required'=>'Message is required',
                'keywords.required'=>'Please check minimum one keyword',
                'gender.required' => 'select at least 1 gender or both'
            ]);
        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->body = $request->body;
        $product->price = $request->price;

        if (in_array('men', $request->get('gender'))){
            $product->men = 1;
        }else{
            $product->men = 0;
        }
        if (in_array('women', $request->get('gender'))){
            $product->women = 1;
        }else{
            $product->women = 0;
        }


        if ($file = $request->file("photo_id")) {
            $path = request()
                ->file("photo_id")
                ->store("products");

            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
            $product->photo_id = $photo->id;
        }
        $product->save();
        /*wegschrijven van meerder rollen in de tussentabel*/
        foreach($request->keywords as $keyword){
            $keywordfind = Keyword::findOrFail($keyword);
            $product->keywords()->save($keywordfind);
        }
        /*wegschrijven van meerder productcategorieen in de tussentabel*/

        $product->productcategories()->sync($request->productcategories,true) ;

        return redirect()->route('products.index')->with([
            'alert' => [
                'message' => 'Product added',
                'type' => 'success'
            ]
        ]);
        //return back()->withInput();
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function productsPerBrand($id){
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->with(['keywords','photo','brand','productcategories'])->paginate(10);
        return view('admin.products.index', compact('products', 'brands'));
    }

    public function productsPerGenderMen(){
        $brands = Brand::all();
        $products = Product::where('men',1)->where('women',0)->with(['keywords','photo','brand','productcategories'])->paginate(10);
        return view('admin.products.index',compact('products','brands'));
    }
    public function productsPerGenderWomen(){
        $brands = Brand::all();
        $products = Product::where('men',0)->where('women',1)->with(['keywords','photo','brand','productcategories'])->paginate(10);
        return view('admin.products.index',compact('products','brands'));
    }
    public function productsPerGenderUnisex(){
        $brands = Brand::all();
        $products = Product::where('men',1)->where('women',1)->with(['keywords','photo','brand','productcategories'])->paginate(10);
        return view('admin.products.index',compact('products','brands'));
    }
}
