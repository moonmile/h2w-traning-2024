<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::all();
        return response()->json([
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->sortid = $request->input('sortid');
        $product->display = $request->input('display');
        $product->created_at = now();
        $product->updated_at = now();
        $product->is_delete = false;
        $product->save();

        return response()->json([
            'data' => $product
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->sortid = $request->input('sortid');
        $product->display = $request->input('display');
        $product->updated_at = now();
        $product->save();

        return response()->json([
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'data' => $product
        ], 204);
    }
}


