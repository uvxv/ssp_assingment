<div>
    @if ($items->count() == 0)
        <div class="flex flex-col items-center justify-center h-96">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-16 h-16 text-gray-400 mb-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-gray-600 mb-6">Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ route('dashboard') }}"
                class="bg-black hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg shadow-pink-500/30 transition transform active:scale-95">
                Start Shopping
            </a>
        </div>
    @else
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Shopping Cart ({{ $items->count() }} Items)</h1>

        <div class="flex flex-col lg:flex-row gap-8 relative">

            <!-- LEFT COLUMN: Cart Items -->
            <div class="flex-1 space-y-4">

                @foreach ($items as $item)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 flex gap-4 items-stretch">
                        <div
                            class="w-20 h-20 md:w-28 md:h-28 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden border border-gray-100">
                            <img src="{{ asset('storage/' . $item->product->image_path) }}" alt="{{ $item->product->name }}"
                                class="w-full h-full object-cover">
                        </div>

                        <!-- Details Middle -->
                        <div class="flex-1 flex flex-col justify-start py-1">
                            <div>
                                <h3 class="font-bold text-gray-900 line-clamp-1 text-base md:text-lg">{{ $item->product->name }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{$item->product->description}}</p>
                            </div>
                        </div>

                        <!-- Right Column: Price & Delete Icon -->
                        <div class="flex flex-col items-end justify-between py-1">
                            <span class="font-bold text-lg text-gray-900">Rs.{{ $item->product->price }}</span>

                            <!-- Heroicon Trash Button -->
                            <button
                                wire:click="removeItem({{ $item->product_id }})"
                                class="text-gray-400 hover:text-red-600 transition p-2 -mr-2 rounded-full hover:bg-red-50 group"
                                title="Remove Item">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-black mt-4 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <!-- RIGHT COLUMN: Order Summary (Sticky Desktop) -->
            <div class="hidden md:block w-80 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-24">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Order Summary</h2>

                    <div class="space-y-3 text-sm text-gray-600 pb-4 border-b border-gray-100">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rs.{{ $total }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping Estimate</span>
                            <span class="text-green-600 font-medium">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax (0%)</span>
                            <span>0</span>
                        </div>
                    </div>

                    <div class="py-4 flex justify-between items-end">
                        <span class="font-medium text-gray-900">Total</span>
                        <span class="text-2xl font-bold text-gray-900"><span class="text-black font-bold">Rs</span>{{ $total }}</span>
                    </div>

                    <a href="{{ route('checkout') }}">
                    <button
                        class="w-full bg-black hover:bg-pink-600 text-white font-bold py-3 px-4 rounded-lg shadow-lg shadow-pink-500/30 transition transform active:scale-95 flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        Checkout
                    </button>
                    </a>

                    <button
                        wire:click="clearCart"
                        wire:confirm="Are you sure you want to clear the cart?"
                        class="w-full mt-3 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-4 rounded-lg transition">
                        Clear Cart
                    </button>

                    <div class="mt-4 flex items-center justify-center gap-2 text-gray-400 text-xl">
                        <i class="fa-brands fa-cc-visa"></i>
                        <i class="fa-brands fa-cc-mastercard"></i>
                        <i class="fa-brands fa-cc-paypal"></i>
                    </div>
                </div>
            </div>

        </div>
    @endif
        
</div>
