<x-guest-layout>
    <div class="mb-4 sm:mb-6">
        <a href="/" class="text-xs sm:text-sm text-gray-300 hover:text-white">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <div class="mb-4 text-xs sm:text-sm text-gray-300">
        {{ __('Terima kasih sudah mendaftar! Sebelum mulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirim. Jika Anda belum menerima emailnya, kami bisa mengirimkannya lagi untuk Anda.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-xs sm:text-sm text-emerald-400">
        {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
    </div>
    @endif

    <div class="mt-4 mb-2 flex flex-col sm:flex-row items-center justify-between gap-3 pb-4 sm:pb-0">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf

            <div>
                <x-primary-button class="w-full sm:w-auto">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
            @csrf

            <button type="submit" class="underline text-xs sm:text-sm text-gray-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full sm:w-auto text-center py-2 sm:py-0">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>