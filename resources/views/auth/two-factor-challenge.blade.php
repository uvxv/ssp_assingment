<x-two-factor-layout>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-[#fce7f3]" x-show="! recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>

                <div class="mb-4 text-sm text-[#fce7f3]/70" x-cloak x-show="recovery">
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <label for="code" class="block text-sm font-medium text-[#fce7f3] mb-2">{{ __('Authentication Code') }}</label>
                    <x-input id="code" class="block w-full pr-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code" class="block text-sm font-medium text-[#fce7f3] mb-2" value="{{ __('Recovery Code') }}" />
                    <x-input id="recovery_code" class="block w-full pr-4 py-2.5 border border-white/20 rounded-lg leading-5 bg-[#27272a] text-[#fdf2f8] placeholder-[#fce7f3]/50 focus:outline-none focus:ring-2 focus:ring-[#ec4899] focus:border-transparent transition duration-200 sm:text-sm" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-[#ec4899] hover:text-[#f472b6] underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-[#ec4899] hover:text-[#f472b6] underline cursor-pointer"
                                    x-cloak
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <button type="submit" class="ml-4  flex justify-center items-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-[#ec4899] hover:bg-[#db2777] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#18181b] focus:ring-[#ec4899] transition-all duration-200 shadow-lg shadow-[#ec4899]/40 hover:shadow-[#ec4899]/60">
                        {{ __('Authenticate') }}
                    </button>
                </div>
            </form>
        </div>
</x-two-factor-layout>
