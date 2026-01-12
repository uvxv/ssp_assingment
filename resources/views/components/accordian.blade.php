<div class="lg:col-span-2">
    <h3 class="text-sm font-semibold text-[#18181b] tracking-wider uppercase mb-6">Frequently Asked Questions</h3>
    
    <div class="space-y-2">
        
        <div x-data="{ expanded: false }" class="border border-zinc-200 rounded-lg bg-white">
            <button @click="expanded = !expanded" class="flex w-full items-center justify-between px-4 py-3 text-left">
                <span class="text-sm font-medium text-zinc-800">Do you offer international shipping?</span>
                <span :class="expanded ? 'rotate-180' : ''" class="transition-transform duration-200 text-zinc-400">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </span>
            </button>
            <div x-show="expanded" x-collapse>
                <div class="px-4 pb-4 pt-0 text-sm text-zinc-500">
                    Yes, we ship to over 50 countries worldwide. Shipping costs are calculated at checkout based on the size and weight of the instrument.
                </div>
            </div>
        </div>

        <div x-data="{ expanded: false }" class="border border-zinc-200 rounded-lg bg-white">
            <button @click="expanded = !expanded" class="flex w-full items-center justify-between px-4 py-3 text-left">
                <span class="text-sm font-medium text-zinc-800">What is the warranty period?</span>
                <span :class="expanded ? 'rotate-180' : ''" class="transition-transform duration-200 text-zinc-400">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </span>
            </button>
            <div x-show="expanded" x-collapse>
                <div class="px-4 pb-4 pt-0 text-sm text-zinc-500">
                    All new instruments come with a standard 2-year manufacturer warranty. We also offer extended protection plans for added peace of mind.
                </div>
            </div>
        </div>

        <div x-data="{ expanded: false }" class="border border-zinc-200 rounded-lg bg-white">
            <button @click="expanded = !expanded" class="flex w-full items-center justify-between px-4 py-3 text-left">
                <span class="text-sm font-medium text-zinc-800">Can I book a demo session?</span>
                <span :class="expanded ? 'rotate-180' : ''" class="transition-transform duration-200 text-zinc-400">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                </span>
            </button>
            <div x-show="expanded" x-collapse>
                <div class="px-4 pb-4 pt-0 text-sm text-zinc-500">
                    Absolutely! You can book a 30-minute private demo session at our main showroom through the 'Lessons' page.
                </div>
            </div>
        </div>

    </div>
</div>