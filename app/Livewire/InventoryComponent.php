<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class InventoryComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function delete($productId)
    {
        $product = Product::find($productId);
        if ($product && $product->admin_id == auth('admin')->id()) {
            $product->delete();
        }
        
        return;
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->where('admin_id', auth('admin')->id())
            ->paginate(5);
        // dd($products);
        return view('livewire.inventory-component', ['products' => $products]);
    }
}
