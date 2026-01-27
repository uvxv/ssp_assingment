<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Pink Dark Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <style>
        /* Syntax Highlighting overrides */
        pre[class*="language-"] {
            border-radius: 0.5rem;
            margin: 0;
            height: 100%;
        }
        
        /* Smooth tab transition */
        .tab-content {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .tab-content.active {
            display: block;
            opacity: 1;
        }
        
        /* Custom Scrollbar for code blocks */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #18181b; 
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #831843; 
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #ec4899; 
        }
    </style>
</head>
<body class="bg-[#18181b] text-[#fdf2f8] font-sans antialiased min-h-screen flex flex-col">

    <!-- Navbar / Toggle -->
    <nav class="w-full p-4 border-b border-[#831843]/30 bg-[#18181b]/80 backdrop-blur-md fixed top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/logo.png') }}" alt="Tesher Harmony Logo" class="w-16 h-16 object-contain" />
                <span class="font-bold text-lg text-white tracking-wide">Tesher<span class="text-[#ec4899]">Harmony</span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow flex items-center justify-center pt-20 px-4">
        
        <!-- PREVIEW TAB -->
        <div id="tab-preview" class="tab-content active w-full max-w-md">
            
            <!-- Card -->
            <div class="bg-[#1f1f22] rounded-2xl shadow-2xl shadow-black/50 overflow-hidden border border-[#831843]/40 relative">
                <!-- Top Accent Line -->
                <div class="h-1 w-full bg-gradient-to-r from-[#831843] via-[#ec4899] to-[#fce7f3]"></div>
                
                <div class="p-8">
                    <h2 class="text-xl font-bold text-white mb-6 text-center">Reset Password</h2>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                        @csrf
                        
                        <!-- Hidden Token-->
                        <input type="hidden" name="token" value="{{ $request->token }}">

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block font-medium text-sm text-[#fce7f3]">Email</label>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                class="block mt-1 w-full bg-[#18181b] border border-[#831843] focus:border-[#ec4899] focus:ring-[#ec4899] rounded-xl shadow-sm text-[#fdf2f8] px-4 py-3 placeholder-gray-500 focus:outline-none focus:ring-1 transition-all" 
                                value="{{ old('email', $request->email ?? '') }}"
                                required 
                                autofocus 
                            />
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block font-medium text-sm text-[#fce7f3]">New Password</label>
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                class="block mt-1 w-full bg-[#18181b] border border-[#831843] focus:border-[#ec4899] focus:ring-[#ec4899] rounded-xl shadow-sm text-[#fdf2f8] px-4 py-3 placeholder-gray-500 focus:outline-none focus:ring-1 transition-all" 
                                required 
                                autocomplete="new-password"
                            />
                        </div>

                        <!-- Confirm Password Input -->
                        <div>
                            <label for="password_confirmation" class="block font-medium text-sm text-[#fce7f3]">Confirm Password</label>
                            <input 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation" 
                                class="block mt-1 w-full bg-[#18181b] border border-[#831843] focus:border-[#ec4899] focus:ring-[#ec4899] rounded-xl shadow-sm text-[#fdf2f8] px-4 py-3 placeholder-gray-500 focus:outline-none focus:ring-1 transition-all" 
                                required 
                                autocomplete="new-password"
                            />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="w-full py-3 px-4 rounded-xl text-white font-bold text-sm uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#1f1f22] focus:ring-[#ec4899] bg-gradient-to-br from-[#db2777] to-[#be185d] hover:from-[#ec4899] hover:to-[#db2777] hover:shadow-[0_0_20px_rgba(236,72,153,0.4)] hover:-translate-y-px transition-all duration-300">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <p class="text-center text-[#831843] text-xs mt-8">
                &copy; 2024 Laravel Pink Theme.
            </p>
        </div>
</body>
</html>