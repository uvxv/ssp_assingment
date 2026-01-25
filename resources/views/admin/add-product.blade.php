<x-admin-layout>
    <div class="fade-in">
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-[#831843]">Add New Product</h1>
                        <p class="text-gray-500 mt-1">Create a new instrument listing in your inventory.</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-white text-gray-600 border border-[#fce7f3] hover:bg-[#fdf2f8] rounded-lg shadow-sm transition-all duration-300">
                            Cancel
                        </a>
                        <button type="submit" form="product-form" class="px-4 py-2 bg-[#db2777] hover:bg-[#ec4899] text-white rounded-lg shadow-lg shadow-[#ec4899]/30 transition-all duration-300 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <span>Save Product</span>
                        </button>
                    </div>
                </div>

                <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    @csrf
                    <div class="lg:col-span-2 space-y-8">
                        
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3]">
                            <h2 class="text-lg font-bold text-gray-800 mb-4 border-b border-[#fdf2f8] pb-2">General Information</h2>
                            
                            <div class="space-y-4">
                                <!-- Product Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                    <input type="text" name="name" id="name" placeholder="e.g. Gibson Les Paul Standard" 
                                        class="w-full rounded-lg border-[#e5e7eb] bg-[#fdf2f8]/50 text-gray-800 focus:ring-2 focus:ring-[#ec4899] focus:border-[#ec4899] transition-colors shadow-sm py-2 px-3">
                                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="description" id="description" rows="4" placeholder="Detailed product specifications..." 
                                        class="w-full rounded-lg border-[#e5e7eb] bg-[#fdf2f8]/50 text-gray-800 focus:ring-2 focus:ring-[#ec4899] focus:border-[#ec4899] transition-colors shadow-sm py-2 px-3">{{ old('description') }}</textarea>
                                    @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Card (only price) -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3]">
                            <h2 class="text-lg font-bold text-gray-800 mb-4 border-b border-[#fdf2f8] pb-2">Pricing & Inventory</h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <!-- Price -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Base Price (Rs)</label>
                                    <div class="relative">
                                        <input type="number" step="0.01" name="price" id="price" placeholder="0.00" 
                                            class="w-full pl-7 rounded-lg border-[#e5e7eb] bg-[#fdf2f8]/50 text-gray-800 focus:ring-2 focus:ring-[#ec4899] focus:border-[#ec4899] transition-colors shadow-sm py-2 px-3" value="{{ old('price') }}">
                                        @error('price') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="space-y-8">      
                        <!-- Status Card -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3]">
                            <h2 class="text-lg font-bold text-gray-800 mb-4">Product Status</h2>
                            <select name="status" class="w-full rounded-lg border-[#e5e7eb] bg-[#fdf2f8]/50 text-gray-800 focus:ring-2 focus:ring-[#ec4899] focus:border-[#ec4899] py-2 px-3">
                                <option value="available">Active</option>
                                <option value="not_available">Out of stock</option>
                            </select>
                        </div>

                        <!-- Image Upload Card -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#fce7f3]">
                            <h2 class="text-lg font-bold text-gray-800 mb-4">Product Image</h2>
                            
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-300 px-6 py-10 hover:bg-[#fdf2f8] transition-colors relative group cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-12 w-12 text-gray-300 group-hover:text-[#ec4899] transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </div>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-[#ec4899] focus-within:outline-none focus-within:ring-2 focus-within:ring-[#ec4899] focus-within:ring-offset-2 hover:text-[#db2777]">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="image" type="file" class="sr-only" onchange="previewImage(event)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                                
                                <!-- Preview Image (Hidden by default) -->
                                <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover rounded-lg hidden">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <script>
                function previewImage(event) {
                    const reader = new FileReader();
                    const imageField = document.getElementById("image-preview");
                    
                    reader.onload = function(){
                        if(reader.readyState == 2){
                            imageField.src = reader.result;
                            imageField.classList.remove('hidden');
                        }
                    }
                    
                    if(event.target.files[0]) {
                        reader.readAsDataURL(event.target.files[0]);
                    }
                }
            </script>

</x-admin-layout>