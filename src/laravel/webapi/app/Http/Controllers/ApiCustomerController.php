<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

/*
-- 
-- 顧客テーブル
-- 
create table Customers (
	id int not null,
	name varchar(100),			-- 顧客id
	hash varchar(100),			-- 顧客名
	lastlogin datetime,			-- 最終ログイン
	created_at datetime,	-- 作成日時
	updated_at datetime,	-- 更新日時
	is_delete bool		-- 削除フラグ
);

*/



class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Customer::all();
        return response()->json([
            'data' => $items
        ], 200);
    }



    public function store(Request $request)
    {
        // Create a new customer
        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->hash = $validatedData['hash'];
        $customer->save();

        return response()->json([
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }


    public function show($id)
    {
        $item = Customer::find($id);
        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'data' => null,
                'message' => 'Not found'
            ], 200);
        }
    }



    public function update(Request $request, Customer $customer)
    {
        // Update the customer
        $customer->name = $validatedData['name'];
        $customer->hash = $validatedData['hash'];
        $customer->save();

        return response()->json([
            'message' => 'Customer updated successfully',
            'data' => $customer
        ], 200);
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ], 200);
    }
}
