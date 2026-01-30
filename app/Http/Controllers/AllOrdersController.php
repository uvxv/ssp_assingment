<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class AllOrdersController extends Controller
{
    public function index()
    {
        $result = Http::withToken(Crypt::decrypt(session('user_token')))
            ->get(config('app.url') . '/api/transactions')
            ->json();
        

        // dd($result);
        $product = Product::join('orders', 'products.product_id', '=', 'orders.product_id')
            ->join('payments', 'orders.payment_id', '=', 'payments.payment_id')
            ->where('payments.user_id', auth()->id())
            ->select('products.*')
            ->get();
        
            dd($product);

        return view('orders', compact('product','result'));
    }
}
