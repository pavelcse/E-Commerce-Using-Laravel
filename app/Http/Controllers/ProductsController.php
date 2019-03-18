<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index()
    {
        return view('products.index', ['products' => Product::paginate(5)]);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'description' => 'required'
        ]);

        $product = new Product;

        $product_image = $request->image;
        $product_image_new_name = time().$product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = 'uploads/products/'.$product_image_new_name; 

        $product->save();

        Session::flash('success', 'Product Added Successfully.');
        return redirect()->route('products.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('products.edit', ['product' => Product::find($id)]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $product = Product::find($id);

       if($request->hasFile('image'))
       {
            $product_image = $request->image;
            $product_image_new_name = time().$product_image->getClientOriginalName();
            $product_image->move('uploads/products', $product_image_new_name);

            $product->image = 'uploads/products/'.$product_image_new_name; 

            $product->save();
       }

       $product->name = $request->name;
       $product->price = $request->price;
       $product->description = $request->description; 

       $product->save();

        Session::flash('success', 'Product Updated Successfully.');
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();
        Session::flash('success', 'Product Deleted Successfully.');
        return redirect()->route('products.index');
    }
}
