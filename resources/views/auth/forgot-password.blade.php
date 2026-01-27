<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Tesher Harmony</title>
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#18181b] text-[#fdf2f8] font-sans antialiased min-h-screen flex flex-col">

    <!-- Navbar / Toggle -->
    <nav class="w-full p-4 border-b border-[#831843]/30 bg-[#18181b]/80 backdrop-blur-md fixed top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/logo.png') }}" alt="Tesher Harmony Logo" class="w-16 h-16 object-contain" />
                <span class="font-bold text-lg text-white tracking-wide">Tesher<span
                        class="text-[#ec4899]">Harmony</span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow flex items-center justify-center pt-20 px-4">

        <!-- PREVIEW TAB -->
        <div id="tab-preview" class="tab-content active w-full max-w-md">

            <!-- Card -->
            <div
                class="bg-[#1f1f22] rounded-2xl shadow-2xl shadow-black/50 overflow-hidden border border-[#831843]/40 relative">
                <!-- Top Accent Line -->
                <div class="h-1 w-full bg-gradient-to-r from-[#831843] via-[#ec4899] to-[#fce7f3]"></div>

                <div class="p-8">
                    <div class="mb-6 text-sm text-[#fce7f3]/80 leading-relaxed">
                        Forgot your password? No problem. Just let us know your email address and we will email you a
                        password reset link that will allow you to choose a new one.
                    </div>

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block font-medium text-sm text-[#fce7f3]">Email</label>
                            <input id="email" type="email" name="email"
                                class="block mt-1 w-full bg-[#18181b] border border-[#831843] focus:border-[#ec4899] focus:ring-[#ec4899] rounded-xl shadow-sm text-[#fdf2f8] px-4 py-3 placeholder-gray-500 focus:outline-none focus:ring-1 transition-all"
                                placeholder="you@example.com" required autofocus />
                        </div>

                        <div id="status-message"
                            class="hidden mb-6 p-4 rounded-lg bg-[#ec4899]/10 border border-[#ec4899]/30 text-[#ec4899] text-sm font-medium flex items-start animate-fade-in">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>We have emailed your password reset link.</span>
                        </div>
                        @if (session('status'))
                            <script>
                                document.getElementById('status-message').classList.remove('hidden');
                            </script>
                        @endif
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="w-full py-3 px-4 rounded-xl text-white font-bold text-sm uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#1f1f22] focus:ring-[#ec4899] bg-gradient-to-br from-[#db2777] to-[#be185d] hover:from-[#ec4899] hover:to-[#db2777] hover:shadow-[0_0_20px_rgba(236,72,153,0.4)] hover:-translate-y-px transition-all duration-300">
                                Email Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center text-[#831843] text-xs mt-8">
                &copy; 2024 Tesher Harmony.
            </p>
        </div>
    </main>
</body>

</html>
