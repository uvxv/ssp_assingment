<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(60px, 40px) scale(1.1);
            }

            66% {
                transform: translate(-100px, -80px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .no-scrollbar {
            scrollbar-width: none;
        }
    </style>
</head>

<body
    class="bg-[#18181b] text-[#fdf2f8] antialiased h-screen w-full flex overflow-hidden font-['Outfit',_sans-serif] selection:bg-[#ec4899] selection:text-white">
    <!-- Main Container -->
    <div class="flex w-full h-full">
        <!-- Left Side: Visual/Art (Hidden on mobile) -->
        <div class="hidden lg:flex w-1/2 relative justify-center items-center bg-[#18181b] overflow-hidden">

            <!-- Content Overlay -->
            <div class="relative z-10 px-12 text-center">
                <div
                    class="mb-8 inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-[#ec4899] to-[#db2777] shadow-lg shadow-[#ec4899]/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19V6l12-3v13 M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 3-2 3-2z M21 16c0 1.105-1.343 2-3 2s-3-.895-3-2 3-2 3-2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-bold tracking-tight mb-4">Feel the Rhythm</h2>
                <p class="text-[#fce7f3]/60 text-lg leading-relaxed max-w-md mx-auto">
                    Experience music like never before with Tesher Harmony. Connect, stream, and discover your new
                    favorite sound.
                </p>
            </div>
        </div>

        <div class="absolute top-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-[#ec4899] rounded-full mix-blend-screen filter blur-3xl opacity-30"
            style="animation: float 7s infinite;"></div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-[#db2777] rounded-full mix-blend-screen filter blur-3xl opacity-30"
            style="animation: float 7s infinite; animation-delay: 2s;"></div>

        <div class="absolute top-1/2 left-3/4 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-[#831843] rounded-full mix-blend-screen filter blur-3xl opacity-30"
            style="animation: float 7s infinite; animation-delay: 4s;"></div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative bg-[#1f1f22] overflow-y-auto">
            <div class="w-full max-w-md space-y-8 relative z-10 my-auto">
                <!-- Header -->
                <div class="text-center lg:text-left">
                    <div
                        class="lg:hidden inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-[#ec4899] to-[#db2777] mb-6 shadow-lg shadow-[#ec4899]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 3-2 3-2zm0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M9 19v2m6-13V3m0 2v2m0-2h6a2 2 0 012 2v2" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold tracking-tight text-white">Welcome Back</h1>
                    <p class="mt-2 text-sm text-[#fce7f3]/50">
                        Sign in to continue to <span class="text-[#ec4899] font-medium">Tesher Harmony</span>
                    </p>
                </div>

                <!-- Form -->
                {{ $slot }}
                
                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/10"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-[#1f1f22] text-[#fce7f3]/40">Or join us</span>
                    </div>
                </div>

                <!-- Social Logins -->
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" onclick="window.location.href='{{ route('admin.register') }}'"
                        class="col-span-2 flex w-full items-center justify-center px-4 py-2.5 border border-white/10 rounded-xl shadow-sm bg-[#18181b] hover:bg-white/5 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </button>
                </div>

                <!-- Footer Text -->
                <p class="mt-8 text-center text-xs text-[#fce7f3]/40">
                    &copy; 2024 Tesher Harmony. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
