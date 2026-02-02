<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use App\Events\PaymentSuccess;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
        $user = $request->user();

        $items = Cart::where('user_id', $user->id)->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Creation of line items for Stripe which includes product details 
        $stripeItems = $items->map(function ($item) {
            return [
                'price_data' => [
                    'currency' => 'lkr',
                    'unit_amount' => (int) ($item->product->price * 100),
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => $item->product->description,
                    ],
                ],
                'metadata' => [
                    'product_id' => $item->product->product_id,
                    'user_id' => $item->user_id,
                ],
                'quantity' => 1,
            ];
        })->toArray();

        // Create the Stripe checkout session
        return $user->checkout($stripeItems, [
            'success_url' => route('checkout-success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout-cancel'),
            'mode' => 'payment',
        ]);
    }

    public function success(Request $request)
    {
        $response = Cashier::stripe()->checkout->sessions->retrieve($request->query('session_id'),[
            'expand' => ['line_items.data','payment_intent.payment_method'],
        ]);
        // dd($response);

        // Trigger the PaymentSuccess event
        event(new PaymentSuccess($response->line_items->data, $response->payment_intent->id, $response->amount_total));
        return view('checkout.success', ['amount_total' => $response->amount_total / 100, 
                                        'id' => $response->payment_intent->id, 
                                        'date' => now(),
                                        'payment_method' => $response->payment_intent->payment_method->card->brand,
                                        'last4' => $response->payment_intent->payment_method->card->last4,
                                    ]);
    }

    public function cancel()
    {
        // Handle payment cancellation
        return redirect()->route('cart.index')->with('payment_status', 'Payment was cancelled.');
    }
}
