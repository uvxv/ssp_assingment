<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesher Harmony | Verify Email</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#18181b] text-[#fdf2f8] font-sans antialiased min-h-screen flex flex-col">

    <nav class="w-full p-4 border-b border-[#831843]/30 bg-[#18181b]/80 backdrop-blur-md fixed top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-10 w-10 object-contain">
                <span class="font-bold text-lg text-white tracking-wide">Tesher<span class="text-[#ec4899]">Harmony</span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow flex items-center justify-center pt-20 px-4">

        <div id="tab-preview" class="tab-content active w-full max-w-md">
            <!-- Card -->
            <div class="bg-[#1f1f22] rounded-2xl shadow-2xl shadow-black/50 overflow-hidden border border-[#831843]/40 relative">
                <!-- Top Accent Line -->
                <div class="h-1 w-full bg-gradient-to-r from-[#831843] via-[#ec4899] to-[#fce7f3]"></div>

                <div class="px-8 pt-8">
                    <h2 class="text-3xl font-bold text-white text-center">Verify Email</h2>
                </div>
                <div class="p-8">
                    <div class="mb-6 text-sm text-[#fce7f3]/80 text-center leading-relaxed">
                        Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </div>

                    <!-- Flash Message Simulation -->
                    <div id="status-message" class="hidden mb-6 p-4 rounded-lg bg-[#ec4899]/10 border border-[#ec4899]/30 text-[#ec4899] text-sm font-medium flex items-start animate-fade-in">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>A new verification link has been sent to the email address you provided in your profile settings.</span>
                    </div>

                    <div class="flex flex-col space-y-4">
                        <!-- Form Area -->
                        <div class="flex items-center justify-between flex-col gap-4">
                            <form action="{{ route('verification.send') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full py-3 px-4 rounded-xl text-white font-bold text-sm uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#1f1f22] focus:ring-[#ec4899] bg-gradient-to-br from-[#db2777] to-[#be185d] hover:from-[#ec4899] hover:to-[#db2777] hover:shadow-[0_0_20px_rgba(236,72,153,0.4)] hover:-translate-y-px transition-all duration-300">
                                    Resend Verification Email
                                </button>
                            </form>

                            <div class="w-full flex justify-between items-center mt-2">
                                <a href="{{ route('profile.show') }}" class="text-sm text-[#ec4899] hover:text-[#fdf2f8] underline decoration-[#831843] underline-offset-4 transition-colors duration-200">
                                    Edit Profile
                                </a>

                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-sm text-gray-400 hover:text-white transition-colors duration-200 font-medium">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="text-center text-[#831843] text-xs mt-8">
                &copy; 2024 Tesher Harmony.
            </p>
        </div>
    </main>
</body>
</html>