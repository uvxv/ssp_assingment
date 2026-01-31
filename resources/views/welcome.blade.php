<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-[#18181b] antialiased flex flex-col min-h-screen">
    <header class="sticky top-0 left-0 right-0 z-50 bg-white border-b border-zinc-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <span class="text-lg font-bold text-zinc-900">Tesher Harmony</span>
            </a>

            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-medium text-[#db2777]">
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            </span>
                            <div
                                class="h-8 w-8 rounded-full bg-zinc-100 border border-zinc-200 flex items-center justify-center text-xs font-bold text-[#db2777]">
                                A
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-1.5 bg-[#db2777] hover:bg-[#d93a00] text-white rounded-md text-sm font-medium shadow transition-colors">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center px-4 py-1.5 border border-zinc-200 hover:bg-zinc-50 text-zinc-800 rounded-md text-sm font-medium transition-colors">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
    <main class="flex-grow">
        <section class="relative overflow-hidden bg-zinc-50 border-b border-zinc-200">
            <div class="max-w-7xl mx-auto px-6 py-24 sm:py-32 lg:flex lg:items-center lg:justify-between lg:gap-12">
                <div class="lg:w-1/2">
                    <div
                        class="inline-flex items-center rounded-full border-3 border-[#fce7f3] bg-primary-50 px-3 py-1 text-sm font-medium text-[#db2777] mb-6">
                        <span>New Arrivals In Stock</span>
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight text-[#18181b] sm:text-6xl">
                        Find Your Perfect <br>
                        <span class="text-primary-600">Sound</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-zinc-600">
                        Meet the heart-melting harmony with Tesher's finely crafted music instruments. A store where
                        your dream music comes to life.
                        At Tesher Harmony, we bring the world of sound to your fingertips. Whether you're a seasoned
                        musician, a passionate beginner,
                        or just exploring the rhythm of life, our curated collection of instruments, gear, and
                        accessories is here to inspire your next note.
                    </p>
                    <div class="mt-10 flex items-center gap-x-6">
                        <a href="#"
                            class="rounded-lg bg-[#18181b] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-zinc-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#18181b] transition">
                            Browse Collection
                        </a>
                        <a href="#"
                            class="text-sm font-semibold leading-6 text-[#18181b] flex items-center gap-1 group">
                            Learn more <span aria-hidden="true"
                                class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
                <!-- Hero Image Placeholder -->
                <div class="mt-16 lg:mt-0 lg:w-1/2 relative">
                    <div
                        class="relative rounded-2xl bg-zinc-900/5 p-2 ring-1 ring-inset ring-zinc-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                        <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                            alt="Musical Instruments"
                            class="rounded-lg shadow-2xl ring-1 ring-zinc-900/10 w-full object-cover aspect-[4/3]">
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURED CATEGORIES -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-2xl font-bold tracking-tight text-zinc-900">Featured Categories</h2>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Category 1 -->
                    <div
                        class="group relative overflow-hidden rounded-xl bg-zinc-50 border border-zinc-200 transition hover:shadow-lg">
                        <div class="aspect-[3/2] w-full overflow-hidden bg-zinc-200">
                            <img src="https://images.unsplash.com/photo-1525201548942-d8732f6617a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Guitars"
                                class="h-full w-full object-cover object-center transition duration-300 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-zinc-900">Guitars</h3>
                            <p class="mt-2 text-sm text-zinc-500">Acoustic, Electric, and Bass guitars for every genre.
                            </p>
                        </div>
                    </div>
                    <!-- Category 2 -->
                    <div
                        class="group relative overflow-hidden rounded-xl bg-zinc-50 border border-zinc-200 transition hover:shadow-lg">
                        <div class="aspect-[3/2] w-full overflow-hidden bg-zinc-200">
                            <img src="https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Piano"
                                class="h-full w-full object-cover object-center transition duration-300 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-zinc-900">Keyboards</h3>
                            <p class="mt-2 text-sm text-zinc-500">Digital pianos, synthesizers, and MIDI controllers.
                            </p>
                        </div>
                    </div>
                    <!-- Category 3 -->
                    <div
                        class="group relative overflow-hidden rounded-xl bg-zinc-50 border border-zinc-200 transition hover:shadow-lg">
                        <div class="aspect-[3/2] w-full overflow-hidden bg-zinc-200">
                            <img src="https://images.unsplash.com/photo-1519892300165-cb5542fb47c7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Drums"
                                class="h-full w-full object-cover object-center transition duration-300 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-zinc-900">Percussion</h3>
                            <p class="mt-2 text-sm text-zinc-500">Drum kits, cymbals, and electronic pads.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER WITH FLUX DROPDOWN (ACCORDION) -->
    <footer class="bg-zinc-50 border-t border-zinc-200 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Brand Column -->
                <div class="lg:col-span-1">
                    <span class="text-lg font-bold text-zinc-900">Tesher Harmony</span>
                    <p class="mt-4 text-sm text-zinc-500 leading-relaxed">
                        Bringing the joy of music to every home. Quality instruments, expert advice, and a community of
                        passionate musicians.
                    </p>
                    <div class="mt-6 flex space-x-4">
                        <a href="#" class="text-zinc-400 hover:text-zinc-600"><span
                                class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg></a>
                        <a href="#" class="text-zinc-400 hover:text-zinc-600"><span
                                class="sr-only">Instagram</span><svg class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465C9.673 2.013 10.03 2 12.315 2zm-1.028 16.5c1.076.049 1.428.06 4.062.06 2.632 0 2.986-.011 4.062-.06.883-.04 1.408-.198 1.742-.328.437-.17.75-.373 1.065-.688.315-.315.518-.628.688-1.065.13-.334.288-.859.328-1.742.049-1.076.06-1.428.06-4.062 0-2.632-.011-2.986-.06-4.062-.04-.883-.198-1.408-.328-1.742a2.915 2.915 0 00-.688-1.065 2.915 2.915 0 00-1.065-.688c-.334-.13-.859-.288-1.742-.328-1.076-.049-1.428-.06-4.062-.06-2.632 0-2.986.011-4.062.06-.883.04-1.408.198-1.742.328-.437.17-.75.373-1.065.688-.315.315-.518.628-.688 1.065-.13.334-.288.859-.328 1.742-.049 1.076-.06 1.428-.06 4.062 0 2.632.011 2.986.06 4.062.04.883.198 1.408.328 1.742.17.437.373.75.688 1.065.315.315.628.518 1.065.688.334.13.859.288 1.742.328zM12 7.007c2.757 0 5 2.243 5 5.007 0 2.764-2.243 5.007-5 5.007-2.757 0-5-2.243-5-5.007 0-2.764 2.243-5.007 5-5.007zm0 1.802a3.205 3.205 0 100 6.41 3.205 3.205 0 100-6.41zM18.8 6.55a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z"
                                    clip-rule="evenodd" />
                            </svg></a>
                    </div>
                </div>

                <x-accordian />

            </div>
            <div class="mt-12 border-t border-zinc-200 pt-8 text-center text-sm text-zinc-500">
                &copy; 2024 Tesher Harmony. All rights reserved.
            </div>
        </div>
    </footer>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
