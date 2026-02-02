<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentController extends Controller
{   // API controller for payments with authorization checks
    public function index()
    {
        $user = request()->user();

        if(!$user->can('viewAny', Payment::class)) {
            $payments = Payment::where('user_id', $user->id)->paginate(10);
            return PaymentResource::collection($payments);
        }

        return PaymentResource::collection(Payment::all()); // return all payments for authorized users
    }

    public function show(Payment $payment)
    {
        $user = request()->user();

        if(!$user->can('view', $payment)) {
            return response()->json(['message' => 'failed'], 403);
        }
        
        return new PaymentResource($payment);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        if(!$user->can('create', Payment::class)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
            'stripe_payment_id' => 'required|string',
        ]);

        $payment = Payment::create($validated);
        return response()->json(['message' => 'success'], 201);
    }

    public function update(Request $request, Payment $payment)
    {
        $user = $request->user();
        if(!$user->can('update', $payment)) {
            return response()->json(['message' => 'failed'], 403);
        }

        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
            'stripe_payment_id' => 'required|string',
        ]);
        $payment->update($validated);
        return response()->json(['message' => 'success'], 200);
    }

    public function destroy(Payment $payment)
    {
        $request = request()->user();

        if(!$request->can('delete', $payment)) {
            return response()->json(['message' => 'failed'], 403);
        }
        $payment->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
