<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $adminId = auth('admin')->id();

        // Total revenue from completed orders for this admin's products
        $totalRevenue = Order::selectRaw('SUM(orders.total_amount) as total')
            ->join('products', 'orders.product_id', '=', 'products.product_id')
            ->where('products.admin_id', $adminId)
            ->where('orders.status', 'paid')
            ->value('total') ?? 0;
        
        $productsSold = Order::join('products', 'orders.product_id', '=', 'products.product_id')
            ->where('products.admin_id', $adminId)
            ->where('orders.status', 'paid')
            ->get();

        // number of avalable items in stock for this admin
        $availableCount = Product::where('admin_id', $adminId)
            ->where('status', 'available')
            ->count();

        // Number of sold itemss (paid orders) for this admin's products
        $soldCount = Order::join('products', 'orders.product_id', '=', 'products.product_id')
            ->where('products.admin_id', $adminId)
            ->where('orders.status', 'paid')
            ->count();

        return view('admin.dashboard', compact('totalRevenue', 'availableCount', 'soldCount', 'productsSold'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard');
        
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user('admin')->tokens()->delete();
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
