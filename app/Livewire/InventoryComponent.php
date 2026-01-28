<?php

namespace App\Livewire;

use Exception;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class InventoryComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function delete($productId)
    {
        Http::withToken(Crypt::decrypt(session('admin_token')))
            ->delete(config('app.url') . '/api/products/' . $productId);
        return;
    }

    public function render()
    {    
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->where('admin_id', auth('admin')->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
            

        return view('livewire.inventory-component', ['products' => $products]);
    }
}
