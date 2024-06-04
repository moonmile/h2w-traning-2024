<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/*

/*
--
-- 商品テーブル
--
create table Products (
	id int not null,
	slug varchar(100),	-- 商品タグ名(英字)
	name varchar(100),	-- 商品名
	description text,	-- 商品説明
	image varchar(100),	-- 商品写真URL
	price decimal(10,2), -- 価格
	sortid int,			-- ソートID
	display bool,		-- 表示有無
    created_at datetime,	-- 作成日時
    updated_at datetime,	-- 更新日時
	is_delete bool		-- 削除フラグ
);

--
-- カテゴリテーブル
--
create table Categories (
	id int not null,
	slug varchar(100),	-- カテゴリタグ(英字)
	title varchar(100),	-- カテゴリ名
	description text,	-- カテゴリ詳細説明
	image varchar(100),	-- カテゴリ画像URL
	sortid int,			-- ソートID
	display bool,		-- 表示有無
	created_at datetime,	-- 作成日時
	updated_at datetime,	-- 更新日時
	is_delete bool		-- 削除フラグ
);

-- 
-- 商品カテゴリの連携テーブル
--
CREATE TABLE product_category_link (
    product_id int not null,	-- 商品ID
    category_id int not null	-- カテゴリID
);


*/


class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*
    public function index()
    {
        $items = Product::all();
        return response()->json([
            'data' => $items
        ], 200);
    }
    */
    public function index()
    {
        // sortid でソートし、ただし display が true のものだけ取得
        $items = Product::where('display', true)
            ->orderBy('sortid', 'asc')
            ->get();

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
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    public function show($id)
    {
        $item = Product::find($id);
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


