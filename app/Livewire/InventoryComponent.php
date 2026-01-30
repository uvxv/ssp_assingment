<?php

namespace App\Livewire;

use Exception;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class InventoryComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function delete($productId)
    {
        Storage::disk('public')->delete(Product::find($productId)->image_path);
        Http::withToken(Crypt::decrypt(session('admin_token')))
            ->delete(config('app.url') . '/api/products/' . $productId);

        return;
    }

    public function toggleStatus($productId)
    {
        $product = Product::find($productId);
        if (! $product) {
            return;
        }

        if ($product->status === 'available') {
            Http::withToken(Crypt::decrypt(session('admin_token')))
                ->put(config('app.url') . '/api/products/' . $productId, [
                    'status' => 'not available',
                ]);
            return;
        } else {
            Http::withToken(Crypt::decrypt(session('admin_token')))
                ->put(config('app.url') . '/api/products/' . $productId, [
                    'status' => 'available',
                ]);
            return;
        }
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->where('admin_id', auth('admin')->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(6);


        return view('livewire.inventory-component', ['products' => $products]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
