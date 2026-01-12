<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesher Harmony | Admin Panel</title>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #18181b;
        }

        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ec4899;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glass effect for dropdowns */
        .glass-panel {
            background: rgba(24, 24, 27, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#fdf2f8] text-[#1f1f22] antialiased selection:bg-[#ec4899] selection:text-white min-h-screen flex flex-col">

    <nav class="sticky top-0 z-50 bg-[#18181b] border-b border-[#ec4899]/30 shadow-lg shadow-[#ec4899]/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- 1. Logo Section -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#ec4899] to-[#db2777] flex items-center justify-center shadow-lg shadow-[#ec4899]/20">
                        <!-- Heroicon: Musical Note -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163z" />
                        </svg>
                    </div>
                    <span class="font-bold text-xl tracking-wide text-white">Tesher<span
                            class="text-[#ec4899]">Harmony</span></span>
                </div>

                <!-- 2. Desktop Navigation Links (Hidden on Mobile) -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#"
                        class="px-3 py-2 rounded-md text-sm font-medium text-white bg-[#ec4899]/20 border border-[#ec4899]/50 transition-all duration-300">
                        Dashboard
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-[#1f1f22] hover:bg-opacity-50 transition-all duration-300">
                        Users
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-[#1f1f22] hover:bg-opacity-50 transition-all duration-300">
                        Songs Library
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-[#1f1f22] hover:bg-opacity-50 transition-all duration-300">
                        Analytics
                    </a>
                    <a href="#"
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-[#1f1f22] hover:bg-opacity-50 transition-all duration-300">
                        Settings
                    </a>
                </div>

                <!-- 3. Right Side Actions -->
                <div class="hidden md:flex items-center gap-4">
                    <!-- Search Bar -->
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400 group-focus-within:text-[#ec4899] transition-colors"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text"
                            class="block w-full pl-10 pr-3 py-1.5 border border-[#333] rounded-full leading-5 bg-[#1f1f22] text-gray-300 placeholder-gray-500 focus:outline-none focus:bg-[#000] focus:border-[#ec4899] focus:ring-1 focus:ring-[#ec4899] sm:text-sm transition-all duration-300"
                            placeholder="Search...">
                    </div>

                    <!-- Notification -->
                    <button
                        class="relative p-1.5 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#18181b] focus:ring-[#ec4899] transition-colors">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span
                            class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full bg-[#ec4899] ring-2 ring-[#18181b]"></span>
                    </button>

                    <!-- Profile Dropdown Trigger -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="flex max-w-xs items-center rounded-full bg-[#1f1f22] text-sm focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:ring-offset-2 focus:ring-offset-[#18181b] transition-all hover:ring-2 hover:ring-[#ec4899]"
                                id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full border border-[#ec4899]/30"
                                    src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="">
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button" onclick="toggleMobileMenu()"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-[#1f1f22] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#ec4899]"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div class="hidden md:hidden border-t border-[#333] glass-panel" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#"
                    class="bg-[#ec4899]/20 text-white block px-3 py-2 rounded-md text-base font-medium border-l-4 border-[#ec4899]">Dashboard</a>
                <a href="#"
                    class="text-gray-300 hover:bg-[#1f1f22] hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors">Users</a>
                <a href="#"
                    class="text-gray-300 hover:bg-[#1f1f22] hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors">Songs
                    Library</a>
                <a href="#"
                    class="text-gray-300 hover:bg-[#1f1f22] hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors">Analytics</a>
                <a href="#"
                    class="text-gray-300 hover:bg-[#1f1f22] hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors">Settings</a>
            </div>
            <div class="pt-4 pb-4 border-t border-[#333]">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full border-2 border-[#ec4899]"
                            src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Tesher Admin</div>
                        <div class="text-sm font-medium leading-none text-gray-400 mt-1">admin@tesher.com</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
    @livewireScripts
</body>

</html>
