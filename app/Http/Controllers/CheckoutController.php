<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class CheckoutController extends Controller
{

    public function checkout(Request $request, $price)
    {
        $user = $request->user();

        $items = Cart::where('user_id', $user->id)->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $stripeItems = $items->map(function ($item) use ($price) {
            return [
                'price_date' => [
                    'currency' => 'lkr',
                    'unit_amount' => (int) ($item->product->price * 100),
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => $item->product->description,
                    ],
                ],
            ];
        })->toArray();

        return $user->chekout($stripeItems, [
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel'),
        ]);
    }

    public function success()
    {
        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
