<x-app-layout>
    <main class="w-full min-h-screen p-6 md:p-8 overflow-y-auto bg-white">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Order History</h1>
                <p class="text-sm text-gray-500 mt-1">Check the status of recent orders, manage returns, and download
                    invoices.</p>
            </div>
            <!-- Filters -->
            <div class="flex gap-2">
                <select
                    class="border border-gray-300 rounded-lg text-sm px-3 py-2 bg-white focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20] cursor-pointer">
                    <option>All Orders</option>
                    <option>Processing</option>
                    <option>Shipped</option>
                    <option>Delivered</option>
                </select>
            </div>
        </div>

        <!-- TABLE VIEW (Desktop) -->
        <!-- Removed overflow-hidden here to allow dropdowns to pop out -->
        <div class="hidden md:block bg-white rounded-xl shadow-sm border border-gray-200 pb-2">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <!-- Added rounded corners to first and last headers manually -->
                        <th class="px-6 py-4 rounded-tl-xl">Order ID</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Payment</th>
                        <th class="px-6 py-4 text-right">Total</th>
                        <th class="px-6 py-4 text-center rounded-tr-xl">Purchased Items</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">

                @if (!empty($result['data']))
                    @foreach ($result['data'] as $order)
                        <tr class="hover:bg-gray-50 transition group">
                            <td class="px-6 py-4 font-medium text-gray-900">#{{ $order['payment_id'] }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $order['created_at'] }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Delivered
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                <div class="flex items-center gap-2">
                                    <i class="fa-brands fa-cc-visa text-xl text-gray-400"></i>
                                    <span class="text-xs">•••• 4242</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-gray-900">${{ number_format($order['amount'], 2) }}</td>

                            <!-- PRODUCT LIST DROPDOWN -->
                            <td class="px-6 py-4 text-center relative">
                                <details class="relative inline-block text-left">
                                    <summary
                                        class="inline-flex items-center gap-2 justify-center w-full px-3 py-1.5 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-[#FF2D20] hover:border-[#FF2D20] cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#FF2D20] transition">
                                        View 3 Items <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </summary>

                                    <!-- Dropdown Content -->
                                    @foreach ($product as $item)
                                        <div
                                            class="absolute right-0 z-50 mt-2 w-80 origin-top-right rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden">
                                            <div
                                                class="bg-gray-50 px-4 py-2 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wide text-left">
                                                Products in this order
                                            </div>
                                            <div class="max-h-64 overflow-y-auto divide-y divide-gray-50">

                                                <!-- Product 1 -->
                                                <div class="flex items-center gap-3 p-3 hover:bg-gray-50 transition">
                                                    <img src="https://images.unsplash.com/photo-1550985543-f47f38aee65d?w=100&q=80"
                                                        class="w-10 h-10 rounded-md object-cover border border-gray-100">
                                                    <div class="flex-1 text-left">
                                                        <p class="text-sm font-medium text-gray-900 line-clamp-1">Fender
                                                            Stratocaster Pro II</p>
                                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                                    </div>
                                                    <span class="text-sm font-bold text-gray-900">$1,499</span>
                                                </div>

                                                <!-- Product 2 -->
                                                <div class="flex items-center gap-3 p-3 hover:bg-gray-50 transition">
                                                    <img src="https://images.unsplash.com/photo-1519892300165-cb5542fb47c7?w=100&q=80"
                                                        class="w-10 h-10 rounded-md object-cover border border-gray-100">
                                                    <div class="flex-1 text-left">
                                                        <p class="text-sm font-medium text-gray-900 line-clamp-1">Grand Stage
                                                            Piano</p>
                                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                                    </div>
                                                    <span class="text-sm font-bold text-gray-900">$2,299</span>
                                                </div>

                                                <!-- Product 3 -->
                                                <div class="flex items-center gap-3 p-3 hover:bg-gray-50 transition">
                                                    <img src="https://images.unsplash.com/photo-1550985543-f47f38aee65d?w=100&q=80"
                                                        class="w-10 h-10 rounded-md object-cover border border-gray-100 grayscale opacity-50">
                                                    <div class="flex-1 text-left">
                                                        <p class="text-sm font-medium text-gray-900 line-clamp-1">Piano Bench
                                                        </p>
                                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                                    </div>
                                                    <span class="text-sm font-bold text-gray-900">$150</span>
                                                </div>

                                            </div>
                                            <div class="bg-gray-50 p-2 text-center border-t border-gray-100">
                                                <a href="#"
                                                    class="text-xs font-bold text-[#FF2D20] hover:underline">Download
                                                    Invoice</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </details>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>


        <!-- CARD VIEW (Mobile) -->
        <div class="md:hidden space-y-4">

            <!-- Mobile Card 1 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 relative">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="text-xs font-bold text-gray-500 uppercase">#ORD-7782</span>
                        <div class="text-xs text-gray-400 mt-0.5">Oct 24, 2023</div>
                    </div>
                    <div class="text-right">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 mb-1">
                            Delivered
                        </span>
                        <p class="text-lg font-bold text-gray-900">$2,913.84</p>
                    </div>
                </div>

                <!-- Mobile Dropdown for Items -->
                <details class="group w-full border-t border-gray-100 pt-3 mt-2">
                    <summary
                        class="flex items-center justify-between text-sm font-medium text-gray-600 cursor-pointer list-none">
                        <span>Purchased 3 Items</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="mt-4 space-y-3">
                        <!-- Mobile Product 1 -->
                        <div class="flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1550985543-f47f38aee65d?w=100&q=80"
                                class="w-12 h-12 rounded-lg object-cover border border-gray-100">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Fender Stratocaster</p>
                                <div class="flex justify-between items-center mt-1">
                                    <p class="text-xs text-gray-500">Qty: 1</p>
                                    <p class="text-sm font-bold text-gray-900">$1,499</p>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Product 2 -->
                        <div class="flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1519892300165-cb5542fb47c7?w=100&q=80"
                                class="w-12 h-12 rounded-lg object-cover border border-gray-100">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Grand Stage Piano</p>
                                <div class="flex justify-between items-center mt-1">
                                    <p class="text-xs text-gray-500">Qty: 1</p>
                                    <p class="text-sm font-bold text-gray-900">$2,299</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </details>
            </div>

            <!-- Mobile Card 2 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 relative">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="text-xs font-bold text-gray-500 uppercase">#ORD-7750</span>
                        <div class="text-xs text-gray-400 mt-0.5">Oct 12, 2023</div>
                    </div>
                    <div class="text-right">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 mb-1">
                            Shipped
                        </span>
                        <p class="text-lg font-bold text-gray-900">$899.00</p>
                    </div>
                </div>

                <!-- Mobile Dropdown for Items -->
                <details class="group w-full border-t border-gray-100 pt-3 mt-2">
                    <summary
                        class="flex items-center justify-between text-sm font-medium text-gray-600 cursor-pointer list-none">
                        <span>Purchased 1 Item</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="mt-4 space-y-3">
                        <!-- Mobile Product 1 -->
                        <div class="flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1563351989-137b02c61195?w=100&q=80"
                                class="w-12 h-12 rounded-lg object-cover border border-gray-100">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Yamaha Drum Kit</p>
                                <div class="flex justify-between items-center mt-1">
                                    <p class="text-xs text-gray-500">Qty: 1</p>
                                    <p class="text-sm font-bold text-gray-900">$899</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </details>
            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <i class="fa-solid fa-chevron-left h-4 w-4 text-xs"></i>
                </a>
                <a href="#" aria-current="page"
                    class="relative z-10 inline-flex items-center bg-[#FF2D20] px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">1</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                <a href="#"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <i class="fa-solid fa-chevron-right h-4 w-4 text-xs"></i>
                </a>
            </nav>
        </div>
    </main>
</x-app-layout>
