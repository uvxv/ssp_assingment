<?php

namespace App\Listeners;

use App\Models\Order;
use App\Models\Payment;
use App\Events\PaymentSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Stripe\Climate\Order as ClimateOrder;

class HandlePaymentSuccess
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentSuccess $event): void
    {
        $items = $event->ItemsList;
        $stripeId = $event->stripeId;
        $amountTotal = $event->amountTotal;

        $payment = Payment::create([
            'user_id' => auth()->id(),
            'stripe_payment_id' => $stripeId,
            'amount' => $amountTotal,
        ]);
        foreach ($items as $item) {
            Order::create([
                'user_id' => $item['metadata']['user_id'],
                'payment_id' => $payment->payment_id,
                'product_id' => $item['metadata']['product_id'],
                'status' => 'paid',
                'total_amount' => $item['amount_total'] / 100,
            ]);
        }
    }
}
