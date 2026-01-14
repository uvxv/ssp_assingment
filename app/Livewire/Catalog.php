<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Cart;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Catalog extends Component
{
    use WithPagination,WithoutUrlPagination;
    
    public $search = '';
    public $productcount = 0;
    public $limit = 10;

    public function loadMore()
    {
        $this->limit += 10;
    }

    public function addToCart($productId)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $existingCartItem = $user->carts()->where('product_id', $productId)->first();
            if (! $existingCartItem) {
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                ]);
            }
        }
    }
    public function render()
    {
        $products = null;
        $this->productcount = Product::where('status','available')->count();
        if ($this->search) {
            $products = Product::take($this->limit)
                        ->where('name', 'like', '%' . $this->search . '%')
                        ->where('status','available')
                        ->get();
        } else {
            $products = Product::take($this->limit)->get();
        }
        return view('livewire.catalog', [
            'products' => $products,
        ]);
    }
}
