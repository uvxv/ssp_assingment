<x-register-layout>
        <form class="mt-8 space-y-6" action="{{ route('register.store') }}" method="POST">
            @csrf
            <!-- Name Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-[#fce7f3] mb-2">First Name</label>
                    <input id="first_name" name="first_name" type="text" required value="{{ old('first_name') }}"
                        class="block w-full px-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm"
                        placeholder="John">
                    @error('first_name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-[#fce7f3] mb-2">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required value="{{ old('last_name') }}"
                        class="block w-full px-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm"
                        placeholder="Doe">
                    @error('last_name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-[#fce7f3] mb-2">Email address</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#fce7f3]/50 group-focus-within:text-[#ec4899] transition-colors"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                        class="block w-full pl-10 pr-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm"
                        placeholder="you@example.com" required>
                </div>
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number Input -->
            <div>
                <label for="phone" class="block text-sm font-medium text-[#fce7f3] mb-2">Phone Number</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#fce7f3]/50 group-focus-within:text-[#ec4899] transition-colors"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input id="phone" name="phone" type="text" autocomplete="tel" required value="{{ old('phone') }}"
                        class="block w-full pl-10 pr-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm"
                        placeholder="94 712345678" required>
                </div>
                @error('phone')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-[#fce7f3] mb-2">Password</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#fce7f3]/50 group-focus-within:text-[#ec4899] transition-colors"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                        class="block w-full pl-10 pr-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm"
                        placeholder="••••••••" required>
                </div>
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-[#fce7f3] mb-2">Verify Password</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#fce7f3]/50 group-focus-within:text-[#ec4899] transition-colors"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="new-password" required
                        class="block w-full pl-10 pr-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm"
                        placeholder="••••••••" required>
                </div>
                @error('password_confirmation')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full flex justify-center items-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-[#ec4899] hover:bg-[#db2777] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#18181b] focus:ring-[#ec4899] transition-all duration-200 shadow-lg shadow-[#ec4899]/40 hover:shadow-[#ec4899]/60">
                    Sign Up
                </button>
            </div>
        </form>
</x-register-layout>
