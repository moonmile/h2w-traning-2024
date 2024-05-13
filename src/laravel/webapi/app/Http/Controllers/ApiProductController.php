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
            'message' => 'Category created successfully',
            'data' => $product
        ], 201);
    }

    public function show(Product $product)
    {
        $item = Product::find($product->id);
        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
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
                'message' => 'Product updated successfully',
                'data' => $product,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}


