<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success | Tesher Harmony</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fdf2f8;
            color: #1f1f22;
        }
        .bg-custom-dark { background-color: #18181b; }
        .text-custom-pink { color: #ec4899; }
        .bg-custom-pink { background-color: #ec4899; }
        .border-custom-accent { border-color: #fce7f3; }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up { animation: slideUp 0.8s ease-out forwards; }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center py-12 px-4">

    <!-- Main Success Container -->
    <div class="max-w-3xl w-full animate-slide-up">
        
        <!-- Success Card -->
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-[#83184310] overflow-hidden border border-custom-accent">
            
            <!-- Dynamic Header -->
            <div class="bg-custom-dark p-12 text-center relative">
                <div class="absolute inset-0 overflow-hidden opacity-20">
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-[#ec4899] rounded-full blur-[100px]"></div>
                    <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-[#831843] rounded-full blur-[100px]"></div>
                </div>
                
                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-custom-pink rounded-full mb-6 shadow-xl shadow-[#ec489940]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-extrabold text-white mb-3">Symphony Complete</h1>
                    <p class="text-[#fce7f3] text-lg opacity-90">Your musical journey continues with Tesher Harmony.</p>
                </div>
            </div>

            <!-- Receipt Section -->
            <div class="p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-[#831843] opacity-60">Order Reference</label>
                        <div class="flex items-center gap-3">
                            <div class="max-w-full overflow-conceal flex items-center gap-2">
                                <p id="order-id" class="text-lg font-mono font-bold text-[#1f1f22] whitespace-nowrap">{{ $id }}...</p>
                            </div>
                            <button type="button" class="px-3 py-1 bg-custom-pink text-white rounded-md text-sm font-semibold hover:bg-[#db2777] select-none"
                                onclick="(function(btn){const txt=document.getElementById('order-id').innerText||''; navigator.clipboard.writeText(txt).then(function(){btn.innerText='Copied'; setTimeout(function(){btn.innerText='Copy';},1200);}).catch(function(){alert('Copy failed')});})(this)">
                                Copy
                            </button>
                        </div>
                    </div>
                    <div class="space-y-1 md:text-right">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-[#831843] opacity-60">Transaction Date</label>
                        <p id="order-date" class="text-lg font-bold text-[#1f1f22]">{{ $date }}</p>
                    </div>
                </div>

                <!-- Static Insight Section -->
                <div id="ai-section" class="mb-12 p-8 rounded-[2rem] bg-[#fdf2f8] border border-custom-accent relative overflow-hidden">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-white rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-custom-pink" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-[#831843]">Maestro's Notes</h2>
                    </div>

                    <div id="ai-content" class="space-y-6">
                        <div>
                            <h3 class="text-sm font-bold text-[#db2777] uppercase tracking-wider mb-2">Instrument Care Guide</h3>
                            <p class="text-[#1f1f22] leading-relaxed text-sm">To maintain the resonance of your new instruments, store them in a temperature-controlled environment away from direct sunlight. For the Grand Piano Tuning Kit, ensure tools are wiped clean after use to prevent oil buildup.</p>
                        </div>
                        <div class="pt-4 border-t border-[#fce7f3]">
                            <h3 class="text-sm font-bold text-[#db2777] uppercase tracking-wider mb-2">Next for your Collection</h3>
                            <p class="text-[#1f1f22] leading-relaxed text-sm">Consider adding a high-precision digital hygrometer to your studio to monitor humidity levels, ensuring your wood-based instruments remain in perfect harmony.</p>
                        </div>
                    </div>
                </div>

                <!-- Total and Actions -->
                <div class="flex flex-col md:flex-row justify-between items-center gap-6 p-8 bg-custom-dark rounded-3xl text-white">
                    <div class="text-center md:text-left">
                        <p class="text-[#fce7f3] opacity-60 text-sm">Total Harmonized</p>
                        <p class="text-4xl font-black text-white">Rs{{ number_format($amount_total, 2) }}</p>
                    </div>
                    <div class="flex gap-4">
                        <button onclick="window.print()" class="px-8 py-4 bg-custom-pink hover:bg-[#db2777] rounded-2xl font-bold transition-all transform hover:scale-105">
                            Invoice PDF
                        </button>
                        <a href="{{ route('dashboard') }}" class="px-8 py-4 bg-[#1f1f22] border border-[#3f3f46] rounded-2xl font-bold hover:bg-black transition-all">
                            Storefront
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <p class="mt-8 text-center text-[#831843] opacity-50 text-sm italic">
            &copy; 2026 Tesher Harmony — Orchestrating Excellence.
        </p>
    </div>
</body>
</html>