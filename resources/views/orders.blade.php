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

                @if ($trasactions->count() > 0)
                    @foreach ($trasactions as $transaction)
                        <tr class="hover:bg-gray-50 transition group">
                            <td class="px-6 py-4 font-medium text-gray-900">#{{ $transaction->payment_id }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $transaction->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Paid
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                <div class="flex items-center gap-2">
                                    <i class="fa-brands fa-cc-visa text-xl text-gray-400"></i>
                                    <span class="text-xs">•••• 4242</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-gray-900">LKR {{ number_format($transaction->amount, 2) }}</td>

                            <!-- PRODUCT LIST DROPDOWN -->
                            <td class="px-6 py-4 text-center relative">
                                <details class="relative inline-block text-left">
                                    <summary
                                        class="inline-flex items-center gap-2 justify-center w-full px-3 py-1.5 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-[#FF2D20] hover:border-[#FF2D20] cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#FF2D20] transition">
                                        View {{ $transaction->orders->count() }} Items <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </summary>

                                    <!-- Dropdown Content -->
                                        <div
                                            class="absolute right-0 z-50 mt-2 w-80 origin-top-right rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden">
                                            <div
                                                class="bg-gray-50 px-4 py-2 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wide text-left">
                                                Products in this order
                                            </div>
                                            <div class="max-h-64 overflow-y-auto divide-y divide-gray-50">
                                            @foreach ($transaction->orders as $order)
                                                <!-- Product 1 -->
                                                <div class="flex items-center gap-3 p-3 hover:bg-gray-50 transition">
                                                    <img src="{{ asset('storage/' . $order->product->image_path) }}"
                                                            class="w-12 h-12 rounded-lg object-cover border border-gray-100">
                                                    <div class="flex-1 text-left">
                                                        <p class="text-sm font-medium text-gray-900 line-clamp-1">Fender
                                                            {{ $order->product->name }}</p>
                                                        <p class="text-xs text-gray-500">status {{ $order->status }}</p>
                                                    </div>
                                                    <span class="text-sm font-bold text-gray-900">LKR {{ number_format($order->product->price, 2) }}</span>
                                                </div>
                                            @endforeach

                                            </div>
                                            <div class="bg-gray-50 p-2 text-center border-t border-gray-100">
                                                <a href="#"
                                                    class="text-xs font-bold text-[#FF2D20] hover:underline">Download
                                                    Invoice</a>
                                            </div>
                                        </div>
                                </details>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No orders found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>


        <!-- CARD VIEW (Mobile) -->
        <div class="md:hidden space-y-4">

            @forelse ($trasactions as $transaction)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="text-xs font-bold text-gray-500 uppercase">#{{ $transaction->payment_id }}</span>
                            <div class="text-xs text-gray-400 mt-0.5">{{ $transaction->created_at->format('M d, Y') }}</div>
                        </div>
                        <div class="text-right">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium mb-1 @if(isset($transaction->status) && strtolower($transaction->status) === 'delivered') bg-green-100 text-green-700 @elseif(isset($transaction->status) && strtolower($transaction->status) === 'shipped') bg-blue-100 text-blue-700 @else bg-gray-100 text-gray-700 @endif">
                                {{ isset($transaction->status) ? ucfirst($transaction->status) : 'Paid' }}
                            </span>
                            <p class="text-lg font-bold text-gray-900">LKR {{ number_format($transaction->amount, 2) }}</p>
                        </div>
                    </div>

                    <!-- Mobile Dropdown for Items -->
                    <details class="group w-full border-t border-gray-100 pt-3 mt-2">
                        <summary
                            class="flex items-center justify-between text-sm font-medium text-gray-600 cursor-pointer list-none">
                            <span>Purchased {{ $transaction->orders->count() }} Item{{ $transaction->orders->count() > 1 ? 's' : '' }}</span>
                            <i class="fa-solid fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                        </summary>

                        <div class="mt-4 space-y-3">
                            @foreach ($transaction->orders as $order)
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $order->product->image_path) }}"
                                        class="w-12 h-12 rounded-lg object-cover border border-gray-100">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ $order->product->name ?? $order->product->title ?? 'Product' }}</p>
                                        <div class="flex justify-between items-center mt-1">
                                            <p class="text-xs text-gray-500">Qty: {{ $order->quantity ?? 1 }}</p>
                                            <p class="text-sm font-bold text-gray-900">LKR {{ number_format($order->product->price, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </details>
                </div>
            @empty
                <div class="text-center text-gray-500">No orders found.</div>
            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            @if ($trasactions->hasPages())
                <div>
                    {{ $trasactions->links() }}
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
