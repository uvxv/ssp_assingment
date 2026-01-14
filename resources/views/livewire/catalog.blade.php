<div>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Search for your heart content</h1>
            <p class="text-sm text-gray-500 mt-1">Found <span class="font-semibold text-gray-900">{{ $productcount }}</span> products</p>
        </div>

        <!-- Search & Sort Controls -->
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search guitars, drums..."
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-laravel focus:border-laravel w-full sm:w-64 shadow-sm transition">
            </div>

            <select
                class="pl-3 pr-8 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-laravel focus:border-laravel bg-white shadow-sm cursor-pointer">
                <option value="newest">Newest Arrivals</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
        </div>
    </div>

    <!-- Layout: Filters + Grid -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Product Grid -->
        <div class="flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- Products  -->
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition group overflow-hidden flex flex-col">
                        <div class="relative aspect-square bg-gray-100 overflow-hidden">
                            <img src="{{ $product->image_path }}"
                                alt="Fender Stratocaster"
                                class="object-cover w-full h-full group-hover:scale-105 transition duration-300">
                            <div
                                class="absolute top-3 right-3 bg-white/90 backdrop-blur rounded-full p-2 shadow-sm text-gray-400 hover:text-red-500 cursor-pointer transition">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent translate-y-full group-hover:translate-y-0 transition duration-300">
                                <button
                                    class="w-full bg-white text-gray-900 font-medium py-2 rounded shadow-lg hover:bg-gray-100 transition text-sm">
                                    Quick View
                                </button>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <p class="text-xs text-laravel font-bold uppercase tracking-wider mb-1">Category</p>
                            <h3
                                class="text-lg font-bold text-gray-900 leading-tight mb-2 group-hover:text-laravel transition">
                                {{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-4 flex-1">{{ $product->description }}</p>
                            @if(auth()->check())
                                @if(! auth()->user()->carts()->where('product_id', $product->product_id)->exists())
                                    <div class="flex items-center justify-between mt-auto">
                                        <span class="text-xl font-bold text-gray-900">Rs {{ $product->price }}</span>
                                        <button wire:click="addToCart({{ $product->product_id }})" class="bg-gray-900 text-white px-3 py-2 rounded-lg hover:bg-gray-800 transition shadow-lg shadow-gray-900/20 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-medium">Add to Cart</span>
                                        </button>
                                    </div>
                                @else
                                    <div class="flex items-center justify-between mt-auto">
                                        <span class="text-xl font-bold text-gray-900">Rs {{ $product->price }}</span>
                                        <button disabled class="bg-green-400 text-white px-3 py-2 rounded-lg flex items-center gap-2 cursor-not-allowed">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-medium">Added</span>
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination / Load More -->
            @if ($products->count() >= $limit)
            <div class="mt-8 flex justify-center">
                <button
                    wire:click="loadMore" class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition shadow-sm">
                    Load More Instruments
                </button>
            </div>
            @endif
            
        </div>

    </div>
</div>
</div>
