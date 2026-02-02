@if(session('payment_status'))
<div id="flash-banner" class="fixed top-6 right-6 transform translate-x-full opacity-0 transition-transform transition-opacity duration-500 ease-out z-[9999]">
    <div class="bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-start gap-3 max-w-md">
        <div class="flex-1">
            <p class="font-semibold">Payment Cancelled</p>
            <p class="text-sm mt-1">{{ session('payment_status') }}</p>
        </div>
        <button id="flash-close" aria-label="Close" class="text-white text-xl leading-none ml-3">&times;</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('flash-banner');
    if (!el) return;

    // slide in (remove hidden classes)
    requestAnimationFrame(() => {
        el.classList.remove('translate-x-full', 'opacity-0');
    });

    // hide function: slide out and fade, then remove from DOM after transition
    const hideEl = () => {
        el.classList.add('translate-x-full', 'opacity-0');
        // remove after animation completes (duration: 500ms)
        setTimeout(() => {
            if (el && el.parentNode) el.parentNode.removeChild(el);
        }, 500);
    };

    // auto hide after 4s
    const timer = setTimeout(hideEl, 4000);

    // manual close
    const close = document.getElementById('flash-close');
    if (close) {
        close.addEventListener('click', function () {
            clearTimeout(timer);
            hideEl();
        });
    }
});
</script>
@endif
