<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public $total = 0;


    public function removeItem($product_id)
    {
        Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $product_id)
            ->delete();
    }

    public function render()
    {
        $items = Cart::where('user_id', auth()->user()->id)->get();
        // dd( $items );
        foreach ($items as $item) {
            $this->total += $item->product->price;
        }
        return view('livewire.cart-component', ['items' => $items, 'total' => $this->total]);
    }
}
