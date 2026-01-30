<x-admin-layout>
    <div class="fade-in space-y-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-[#831843]">Store Overview</h1>
                <p class="text-gray-500 mt-1">Sales performance and inventory status.</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-4 py-2 bg-white text-gray-600 border border-[#fce7f3] hover:bg-[#fdf2f8] rounded-lg shadow-sm transition-all duration-300 flex items-center gap-2">
                    <span>Export Report</span>
                </button>
                <a href="{{ route('products.form') }}">
                <button
                    class="px-4 py-2 bg-[#db2777] hover:bg-[#ec4899] text-white rounded-lg shadow-lg shadow-[#ec4899]/30 transition-all duration-300 flex items-center gap-2">
                    <span>Add Product</span>
                </button>
                </a>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Revenue -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3] hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-[#fdf2f8] rounded-xl text-[#db2777]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 bg-green-100 text-green-600 rounded-full">12.5%</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">LKR {{ number_format($totalRevenue, 2) }}</h3>
                <p class="text-sm text-gray-500">Total Revenue</p>
            </div>

            <!-- Orders -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3] hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-[#fdf2f8] rounded-xl text-[#db2777]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 bg-green-100 text-green-600 rounded-full">+4.2%</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">{{ $soldCount }}</h3>
                <p class="text-sm text-gray-500">Instruments Sold</p>
            </div>

            <!-- Inventory Status -->
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3] hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-[#fdf2f8] rounded-xl text-[#db2777]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                        </svg>
                    </div>
                    @if($availableCount <= 5)  
                    <span class="text-xs font-semibold px-2 py-1 bg-red-100 text-red-600 rounded-full">
                        Low Stock</span>
                    @else
                    <span class="text-xs font-semibold px-2 py-1 bg-green-100 text-green-600 rounded-full">Stable</span>
                    @endif
                </div>
                <h3 class="text-3xl font-bold text-gray-800">{{ $availableCount }}</h3>
                <p class="text-sm text-gray-500">Items in Stock</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Chart: Sales History -->
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-[#fce7f3] shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Revenue Overview</h3>
                    <select
                        class="text-sm border-gray-200 rounded-md text-gray-500 focus:border-[#ec4899] focus:ring focus:ring-[#ec4899]/20 outline-none">
                        <option>Last 12 Months</option>
                        <option>Last 30 Days</option>
                    </select>
                </div>
                    <livewire:revenue-chart />
            </div>

            <!-- Side Chart: Category Distribution -->
            <div class="bg-white p-6 rounded-2xl border border-[#fce7f3] shadow-sm flex flex-col">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Sales by Category</h3>
                <div class="relative h-64 w-full flex-1 flex items-center justify-center">
                    <canvas id="categoryChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-2 text-sm text-gray-600">
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-[#ec4899]"></span> Guitars
                    </div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-[#831843]"></span>
                        Keyboards</div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-[#fce7f3]"></span> Drums
                    </div>
                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-[#18181b]"></span>
                        Accessories</div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="bg-white rounded-2xl border border-[#fce7f3] shadow-sm overflow-hidden">
            <div class="p-6 border-b border-[#fdf2f8] flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Recent Instrument Orders</h2>
                <button class="text-sm text-[#db2777] hover:text-[#831843] font-medium">View All Orders</button>
            </div>
            <div class="overflow-x-auto">
                @if($productsSold->count() > 0)
                    @foreach ($productsSold as $item)
                        <table class="w-full text-left">
                            <thead class="bg-[#fdf2f8]/50 text-xs uppercase text-gray-500 font-semibold">
                                <tr>
                                    <th class="px-6 py-4">Product</th>
                                    <th class="px-6 py-4">Customer</th>
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Amount</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#fdf2f8] text-sm">
                                <!-- Order Row 1 -->
                                <tr class="hover:bg-[#fdf2f8]/30 transition-colors duration-200">
                                    <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-[#fce7f3] flex items-center justify-center text-[#db2777]">
                                            <img src="{{ asset($item->product->image_path) }}" alt="Gibson Les Paul"
                                                class="w-8 h-8 object-contain">
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $item->product->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->customer->name }}</td>
                                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-800">LKR {{ number_format($item->total_amount, 2) }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-gray-400 hover:text-[#db2777] transition-colors"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg></button>
                                    </td>
                                </tr>
                                <!-- More rows would go here -->
                            </tbody>
                        </table>
                    @endforeach
                @else
                    <div class="p-6 text-center text-gray-500">
                        No recent orders found.
                    </div>
                @endif
            </div>
        </div>
    </div> 
</x-admin-layout>