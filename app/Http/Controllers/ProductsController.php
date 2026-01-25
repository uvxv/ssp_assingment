<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{ // used a dedicated products controller cuz the teh admin.add-product route return a full page view

    public function store(Request $request)
    {
        // Valdate the incoming request date
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,available',
            'image' => 'nullable|image|max:2048', 
        ]);

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        // Create a new product record in the database
        Product::create([
            'admin_id' => auth()->guard('admin')->id(),
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'status' => $validatedData['status'],
            'image_path' => $validatedData['image_path'] ?? null,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

}
