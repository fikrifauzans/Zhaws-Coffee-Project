<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products =  Product::latest()->paginate(6)->withQueryString();
        return view(
            'admin.HomeProduct',
            [
                'products' => $products
            ]
        );
    }


    public function create()
    {
        return view('admin.Product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'category' => 'required',
            'image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            //code...
            Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'category' => $request['category']
            ]);
            $image_1 = $request->image_1 ? time() . '-' . '1' . '.' . $request['image_1']->extension() : null;
            $image_2 = $request->image_2 ? time() . '-' . '2' . '.' . $request['image_2']->extension() : null;
            $image_3 = $request->image_3 ? time() . '-' . '3' . '.' . $request['image_3']->extension() : null;
            $image_1 ? $request->image_1->move(public_path('ProductImages'), $image_1) : false;
            $image_2 ? $request->image_2->move(public_path('ProductImages'), $image_2) : false;
            $image_3 ? $request->image_3->move(public_path('ProductImages'), $image_3) : false;
            $product = new \App\Models\Image;
            $product->image_1 = $image_1;
            $product->image_2 = $image_2;
            $product->image_3 = $image_3;
            $product->product_id = \App\Models\Product::latest()->first()->id;
            $product->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect('/admin/product');
    }

    public function show(Product $product)
    {

        return view('admin.product', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.Product.edit', [
            'product' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        try {
            //code...
            $product->delete();
            return response()->json(['message' => "Success", 'status' => 200]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'Fail', 'status' => 500]);
        }
    }
}
