<?php

namespace App\Http\Controllers;

use App\Models\CategoryProducts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Products::with(['category'])->get();
        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = CategoryProducts::all();
        return view('add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'mimes:jpg,jpeg,png|max:2048'
            ],
        );
        $filename = "";
        $key =  Str::random(10);
        if ($request->image <> "") {
            $file = $request->image;
            $filename = 'assets/product' . '/' . $key . '.' . $file->extension();
            $file->move(public_path('assets/product'), $filename);
        }
        $data = $request->all();
        $data['slug'] = Str::slug($request->name_products);
        $data['image'] = $filename;
        Products::create($data);
        // echo json_encode($data);
        return redirect()->route('products.index');
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
        $products = Products::findOrFail($id)->delete();
        // $products->delete();
        return redirect()->route('category');
    }
}
