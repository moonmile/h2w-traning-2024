<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\ProductRecommendation;
use Illuminate\Http\Request;


class ApiStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Store::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = new Store;
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->created_at = now();
        $store->updated_at = now();
        $store->save();

        return response()->json([
            'message' => 'Store created successfully',
            'data' => $store
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = Store::find($id);
        if ($store) {
            return response()->json([
                'message' => 'OK',
                'data' => $store
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 200);
        }
    }

    /**
     * Display the products of the specified resource.
     */
    public function products($id)
    {
        $store = Store::with('products.product')->findOrFail($id);

        if ( $store ) {
            return response()->json([
                'message' => 'OK',
                'data' => $store
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 200);
        }
    }

    /**
     * Display the recommendations of the specified resource.
     */
    public function recommendations($id)
    {
        $recommendations = ProductRecommendation::with('product')
            ->where('store_id', $id)
            ->where('display', true)
            ->get();

        if ( $recommendations ) {
            return response()->json([
                'message' => 'OK',
                'data' => $recommendations
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 200);
        }
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $store = Store::find($id);
        if ( $store ) {
            $store->name = $request->input('name');
            $store->address = $request->input('address');
            $store->updated_at = now();
            $store->save();
            return response()->json([
                'message' => 'Store updated successfully',
                'data' => $store
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
        $store = Store::find($id);
        if ($store) {
            $store->delete();
            return response()->json([
                'message' => 'Store deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 200);
        }
    }
}
