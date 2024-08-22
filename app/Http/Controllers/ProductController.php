<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function expensiveProducts($amount)
{
    $products = Product::where('price', '>', 100)->get();
}public function index()
{
    return ProductResource::collection(Product::all());
}

public function store(Request $request)
{
    $product = Product::create($request->all());
    return new ProductResource($product);
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $product->update($request->all());
    return new ProductResource($product);
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    return response(null, 204);
}

}
