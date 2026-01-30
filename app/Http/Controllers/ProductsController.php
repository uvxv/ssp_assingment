<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductsController extends Controller
{ // used a dedicated products controller cuz the teh admin.add-product route return a full page view

    public function store(Request $request)
    {
        // Valdate the incoming request date
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,not_available',
            'image' => 'nullable|image|max:2048', 
        ]);

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            unset($validatedData['image']);
            $validatedData['image_path'] = $imagePath;
        }

        
        // dd($validatedData);
        

        // Create a new product record in the database using api
        $status = Http::withToken(Crypt::decrypt(session()->get('admin_token')))
                    ->post(config('app.url') . '/api/products', [
                        'admin_id' => auth('admin')->id(),
                        'name' => $validatedData['name'],
                        'description' => $validatedData['description'],
                        'price' => $validatedData['price'],
                        'status' => $validatedData['status'],
                        'image_path' => $validatedData['image_path'],
                    ]);

        if ($status->failed()) {
            return dd($status);
        }
        
        return redirect()->back()->with('success', 'Product added successfully!');
    }

}
