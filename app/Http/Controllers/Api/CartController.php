<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;

class CartController extends Controller
{
    public function index()
    {
        $user = request()->user();

        if(!$user->can('viewAny', Cart::class)) {
            $carts = Cart::where('user_id', $user->id)->get();
            return CartResource::collection($carts);
        }
        return CartResource::collection(Cart::all());
    }

    public function show(Cart $cart)
    {
        $user = request()->user();

        if(!$user->can('view', $cart)) {
            return response()->json(['message' => 'failed'], 403);
        }
        
        return new CartResource($cart);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        if(!$user->can('create', Cart::class)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        $cart = Cart::create($validated);
        return response()->json(['message' => 'success'], 201);
    }

    public function update(Request $request, Cart $cart)
    {
        $user = $request->user();
        if(!$user->can('update', $cart)) {
            return response()->json(['message' => 'failed'], 403);
        }

        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        Cart::where('id', $cart->id)->update($validated);
        return response()->json(['message' => 'success'], 200);
    }

    public function destroy(Cart $cart)
    {
        $request = request()->user();

        if(!$request->can('delete', $cart)) {
            return response()->json(['message' => 'failed'], 403);
        }
        $cart->delete();
        
        return response()->json(['message' => 'success'], 200);
    }
}
