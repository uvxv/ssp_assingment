<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class AllOrdersController extends Controller
{
    public function index()
    {
        $result = Http::withToken(Crypt::decrypt(session('user_token')))
            ->get(config('app.url') . '/api/transactions')
            ->json();
        

        // dd($result);
        $trasactions = Payment::with('orders.product')->paginate(10);   
        
        // dd($trasactions);

        return view('orders', compact('trasactions','result'));
    }
}
