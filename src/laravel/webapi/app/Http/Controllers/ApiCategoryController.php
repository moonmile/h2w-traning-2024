<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::all();
        return response()->json([
            'data' => $items,
        ], 200);
    }



    /**
     * カテゴリの slug を指定して、商品一覧を取得する
     */
    public function products( $category_slug )
    {
        $items = Category::with('products')
                    ->where('slug', $category_slug)
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
        $category = new Category();
        $category->slug = $request->input('slug');
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->image = $request->input('image');
        $category->sortid = $request->input('sortid');
        $category->display = $request->input('display');
        $category->created_at = now();
        $category->updated_at = now();
        $category->save();

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Category::find($id);
        if ($item) {
            return response()->json([
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'data' => null,
                'message' => 'Not found',
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->slug = $request->input('slug');
            $category->title = $request->input('title');
            $category->description = $request->input('description');
            $category->image = $request->input('image');
            $category->sortid = $request->input('sortid');
            $category->display = $request->input('display');
            $category->updated_at = now();
            $category->save();
            return response()->json([
                'message' => 'Category updated successfully',
                'data' => $category,
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
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
        ], 200);
    }
}
