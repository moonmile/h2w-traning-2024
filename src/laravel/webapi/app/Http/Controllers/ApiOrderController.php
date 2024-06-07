<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Order::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => now(),
            'order_no' => $request->order_no,
            'total' => $request->total,
        ]);

        foreach ($request->products as $product) {
            Sale::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'sale_date' => now(),
            ]);
        }

        return response()->json($order->load('sales.product'), 201);    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return response()->json([
                'message' => 'OK',
                'data' => $order
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     * 編集はできない
     */
    public function update(Request $request, $id)
    {
        return response()->json([
            'message' => 'Not found',
            'data' => null
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * 削除はできない
     */
    public function destroy($id)
    {
        return response()->json([
            'message' => 'Not found',
            'data' => null
        ], 200);
    }
}
