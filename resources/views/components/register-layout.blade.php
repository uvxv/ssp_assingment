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

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/10"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-[#1f1f22] text-[#fce7f3]/40">Or sign up with</span>
                    </div>
                </div>

                <!-- Social Logins -->
                <div class="grid grid-cols-2 gap-4">
                    <button type="button"
                        class="flex items-center justify-center px-4 py-2.5 border border-white/10 rounded-xl shadow-sm bg-[#18181b] hover:bg-white/5 transition-colors duration-200">
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.813 1.053 6.427 2.56L21.36 3.467c-2.32-2.16-5.413-3.467-8.96-3.467-7.147 0-12.933 5.307-12.933 11.893 0 6.587 5.787 11.893 12.933 11.893 3.733 0 6.88-1.227 9.173-3.36 2.32-2.16 2.96-5.333 2.96-7.52 0-.667-.053-1.307-.16-1.92h-11.84z" />
                        </svg>
                    </button>
                    <button type="button"
                        class="flex items-center justify-center px-4 py-2.5 border border-white/10 rounded-xl shadow-sm bg-[#18181b] hover:bg-white/5 transition-colors duration-200">
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Footer Text -->
                <p class="mt-8 text-center text-sm text-[#fce7f3]/60">
                    Already have an account?
                    <a href="{{ url('login') }}"
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
