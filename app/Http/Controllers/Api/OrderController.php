<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{ // API controller for orders with authorization checks
    public function index()
    {
        $user = request()->user(); // get the authenticated user


        if(!$user->can('viewAny', Order::class)) { // if user cannot view any orders
            $orders = Order::where('user_id', $user->id)->get();
            return OrderResource::collection($orders);
        }

        return OrderResource::collection(Order::all());
    }

    public function show(Order $order)
    {
        $user = request()->user();

        if(!$user->can('view', $order)) { // if user cannot view the order
            return response()->json(['message' => 'failed'], 403);
        }
        
        return new OrderResource($order);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        if(!$user->can('create', Order::class)) {
            return response()->json(['message' => 'failed'], 403);
        }

        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'payment_id' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|in:pending,completed',
        ]); // validate incoming request data

        $order = Order::create($validated);
        return response()->json(['message' => 'success'], 201);
    }

    public function update(Request $request, Order $order)
    {
        $user = $request->user();
        if(!$user->can('update', $order)) {
            return response()->json(['message' => 'failed'], 403);
        }

        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'payment_id' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|in:pending,completed',
        ]);

        Order::where('order_id', $order->order_id)->update($validated);
        return response()->json(['message' => 'success'], 200);
    }

    public function destroy(Order $order)
    {
        $request = request()->user();

        if(!$request->can('delete', $order)) {
            return response()->json(['message' => 'failed'], 403);
        }
        $order->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
