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

        <div
            class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative bg-[#1f1f22] overflow-y-auto no-scrollbar">
            <!-- Mobile Background Decorations -->
            <div class="absolute lg:hidden top-[-10%] right-[-10%] w-64 h-64 bg-[#ec4899]/20 rounded-full blur-3xl">
            </div>

            <div class="w-full max-w-md space-y-8 relative z-10 my-auto">
                <!-- Header -->
                <div class="text-center lg:text-left">
                    <div
                        class="lg:hidden inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-[#ec4899] to-[#db2777] mb-6 shadow-lg shadow-[#ec4899]/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19V6l12-3v13 M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 3-2 3-2z M21 16c0 1.105-1.343 2-3 2s-3-.895-3-2 3-2 3-2z" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold tracking-tight text-white">Create Account</h1>
                    <p class="mt-2 text-sm text-[#fce7f3]/50">
                        Join the rhythm of <span class="text-[#ec4899] font-medium">Tesher Harmony</span> today.
                    </p>
                </div>

                <!-- Form -->
                {{ $slot }}


                <!-- Footer Text -->
                <p class="mt-8 text-center text-sm text-[#fce7f3]/60">
                    Already have an account?
                    <a href="{{ route('admin.login') }}"
                        class="font-medium text-[#ec4899] hover:text-[#f472b6] transition-colors">Sign in</a>
                </p>
            </div>
        </div>

        <!-- Right Side: Visual/Art (Was Left) -->
        <div class="hidden lg:flex w-1/2 relative justify-center items-center bg-[#18181b] overflow-hidden">
            <!-- Ambient Background Effects -->
            <div
                class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#831843]/40 via-[#18181b] to-[#18181b] z-0">
            </div>

            <!-- Animated Blobs -->
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-[#ec4899] rounded-full mix-blend-screen filter blur-3xl opacity-30"
                style="animation: float 7s infinite;"></div>

            <div class="absolute top-1/3 right-1/4 w-72 h-72 bg-[#db2777] rounded-full mix-blend-screen filter blur-3xl opacity-30"
                style="animation: float 7s infinite; animation-delay: 2s;"></div>

            <div class="absolute -bottom-8 left-1/3 w-72 h-72 bg-[#831843] rounded-full mix-blend-screen filter blur-3xl opacity-30"
                style="animation: float 7s infinite; animation-delay: 4s;"></div>

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

    </div>
</body>

</html>
