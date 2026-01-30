<div>
    <div class="fade-in space-y-6">

        <!-- Component Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-[#831843]">Inventory Management</h1>
                <p class="text-gray-500 mt-1">Manage your musical instruments, stock, and pricing.</p>
            </div>
            <a href="{{ route('products.form') }}"
                class="px-4 py-2 bg-[#db2777] hover:bg-[#ec4899] text-white rounded-lg shadow-lg shadow-[#ec4899]/30 transition-all duration-300 flex items-center gap-2 transform hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Add Product</span>
            </a>
        </div>

        <!-- Filters & Search Toolbar -->
        <div
            class="bg-white p-4 rounded-2xl shadow-sm border border-[#fce7f3] flex flex-col sm:flex-row gap-4 items-center justify-between">

            <!-- Search Input (wire:model.live="search") -->
            <div class="relative w-full sm:w-96">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search"
                    class="block w-full pl-10 pr-3 py-2 border border-[#fce7f3] rounded-lg leading-5 bg-[#fdf2f8]/30 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#ec4899] focus:border-[#ec4899] sm:text-sm transition-all"
                    placeholder="Search by name, SKU, or category...">
            </div>

            <!-- Filters -->
            <div class="flex gap-3 w-full sm:w-auto">
                <select
                    class="w-full sm:w-auto rounded-lg border-[#fce7f3] bg-white text-gray-700 text-sm focus:ring-[#ec4899] focus:border-[#ec4899] py-2 px-3">
                    <option value="">All Status </option>
                    <option value="active">Active</option>
                    <option value="low_stock">Low Stock</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-2xl border border-[#fce7f3] shadow-sm overflow-hidden">

            <!-- Loading Indicator (Livewire specific) -->
            <div wire:loading class="w-full h-1 bg-[#fdf2f8] overflow-hidden">
                <div class="w-full h-full bg-[#ec4899] origin-left animate-progress"></div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead
                        class="bg-[#fdf2f8]/50 text-xs uppercase text-gray-500 font-semibold border-b border-[#fce7f3]">
                        <tr>
                            <th class="px-6 py-4">Product</th>
                            <th class="px-6 py-4 cursor-pointer hover:text-[#ec4899] group"
                                wire:click="sortBy('price')">
                                <div class="flex items-center gap-1">
                                    Price
                                    <svg class="w-3 h-3 text-gray-400 group-hover:text-[#ec4899]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#fdf2f8] text-sm">
                        @if ($products != null)
                            @foreach ($products as $product)
                                <tr wire:key="product-{{ $product->product_id }}" class="hover:bg-[#fdf2f8]/30 transition-colors duration-200 group">
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        <div class="flex items-center gap-3">
                                            <!-- Product Image -->
                                            <div
                                                class="w-12 h-12 rounded-lg bg-[#fce7f3] flex-shrink-0 border border-[#fce7f3] overflow-hidden">
                                                <img src="{{ asset('storage/' . $product->image_path) }}"
                                                    alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <div class="font-bold text-[#831843]">{{ $product->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-800">Rs.
                                        {{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4">
                                        @if ($product->status === 'available')
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Available
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Not Available
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button wire:click="toggleStatus({{ $product->product_id }})"
                                                wire:loading.attr="disabled"
                                                class="p-1.5 rounded-md hover:bg-gray-50 text-gray-400 hover:text-[#0ea5a4] transition-colors"
                                                title="Toggle availability">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 12a9 9 0 1118 0 9 9 0 01-18 0zm9-4v4l3 3" />
                                                </svg>
                                            </button>

                                            <button wire:click="delete({{ $product->product_id }})"
                                                wire:confirm="Are you sure you want to delete this product?"
                                                class="p-1.5 rounded-md hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors"
                                                title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No products found.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Pagination (Visual Simulation) -->
            @if ($products->hasPages())
                
                <div class="px-6 py-4 border-t border-[#fce7f3] bg-[#fdf2f8]/30 flex items-center justify-between">
                    <span class="text-sm text-gray-500">
                        Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }}
                        items
                    </span>
                    <div class="flex gap-2">
                        <button wire:click="previousPage" wire:loading.attr="disabled" wire:key="pagination-prev"
                            {{ $products->onFirstPage() ? 'disabled' : '' }}
                            class="px-3 py-1 rounded-md border border-[#fce7f3] bg-white {{ $products->onFirstPage() ? 'text-gray-300' : 'text-gray-400 hover:text-[#ec4899]' }} text-sm">
                            Previous
                        </button>

                        <button wire:click="nextPage" wire:loading.attr="disabled" wire:key="pagination-next"
                            {{ !$products->hasMorePages() ? 'disabled' : '' }}
                            class="px-3 py-1 rounded-md border border-[#fce7f3] bg-white {{ !$products->hasMorePages() ? 'text-gray-300' : 'text-gray-600 hover:text-[#ec4899] hover:border-[#ec4899]' }} text-sm transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
