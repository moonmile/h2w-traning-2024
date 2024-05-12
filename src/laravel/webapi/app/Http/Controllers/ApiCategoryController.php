<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @OA\OpenApi(
 *   @OA\Info(
 *     title="Hunbarger API",
 *     version="1.0.0",
 *     description="This is a sample server for a pet store.",
 *     @OA\Contact(
 *       email="support@example.com"
 *     )
 *   )
 * )
 */


 class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @OA\Get(
     *     path="/categories",
     *     @OA\Response(response="200", description="Display a listing of categories.")
     * )
     */
    public function index()
    {
        $items = Category::all();
        return response()->json([
            'data' => $items,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $item = Category::find($category->id);
        if ($item) {
            return response()->json([
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
