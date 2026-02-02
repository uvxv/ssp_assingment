<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{  // API controller for products with authorization checks
    public function index()
    {
        $user = request()->user();

        if(!$user->can('viewAny', Product::class)) {
            $products = Product::where('admin_id', $user->id)->paginate(10);
            return ProductResource::collection($products);
        }

        return ProductResource::collection(Product::paginate(2));
    }

    public function show(Product $product)
    {
        $user = request()->user();

        if(!$user->can('view', $product)) {
            return response()->json(['message' => 'failed'], 403);
        }
        
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        if(!$user->can('create', Product::class)) {
            return response()->json(['message' => 'failed'], 403);
        }

        $data = $request->validate([
            'admin_id' => 'required|integer|exists:admins,admin_id',
            'image_path' => 'nullable|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'nullable|in:available,not available',
        ]);

        $product = Product::create($data + ['admin_id' => auth('admin')->id() ?? null]);

        return response()->json(['message' => 'success'], 201);
    }

    public function update(Request $request, Product $product)
    {
        $user = $request->user();

        if(!$user->can('update', $product)) {
            return response()->json(['message' => 'failed'], 403);
        }

        $data = $request->validate([
            'image_path' => 'nullable|string',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'status' => 'nullable|in:available,not available',
        ]);

        Product::where('product_id', $product->product_id)->update($data);
        return response()->json(['message' => 'success'], 200);
    }

    public function destroy(Product $product)
    {
        $user = request()->user(); 

        if($user->cannot('delete', $product)) {
            return response()->json(['message' => 'failed'], 403);
        }  
        $product->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
