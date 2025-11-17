<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="mb-4 sm:mb-6">
        <a href="/" class="text-xs sm:text-sm text-gray-300 hover:text-white">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <div class="mb-4 sm:mb-6">
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-center pb-2 text-white">Masuk</h2>
        <p class="text-xs sm:text-sm md:text-base text-center text-gray-300 px-2">Masukkan email dan password untuk melanjutkan</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="pb-4 sm:pb-0">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-1 sm:gap-0">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                <a class="underline text-xs sm:text-sm text-gray-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" placeholder="Masukkan password Anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-white/10 bg-slate-900/50 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-xs sm:text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-1 mt-4 mb-2 text-xs sm:text-sm md:text-base">
            <p class="text-gray-300">Belum punya akun?</p>
            <a href="/register" class="hover:underline text-indigo-300">Daftar sekarang</a>
        </div>
    </form>
</x-guest-layout>