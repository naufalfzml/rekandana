<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-100 leading-tight">
            Buat Kode Referral Baru
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8 md:py-10 lg:py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card overflow-hidden rounded-lg sm:rounded-xl">
                <div class="p-4 sm:p-6 md:p-8 text-gray-100">
                    <form method="POST" action="{{ route('admin.referral-codes.store') }}" class="space-y-4 sm:space-y-5">
                        @csrf

                        <div>
                            <x-input-label for="code" value="Kode Referral" />
                            <x-text-input id="code" class="block mt-1 w-full text-sm sm:text-base" type="text" name="code" :value="old('code')" required autofocus placeholder="Contoh: SPONSOR2024" />
                            <p class="text-xs sm:text-sm text-gray-400 mt-1">Kode akan otomatis diubah ke huruf kapital</p>
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" class="rounded border-white/10 bg-slate-900/50 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('is_active', true) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-300">Aktifkan kode ini</span>
                            </label>
                        </div>

                        <div>
                            <x-input-label for="max_uses" value="Batas Maksimal Penggunaan (Opsional)" />
                            <x-text-input id="max_uses" class="block mt-1 w-full text-sm sm:text-base" type="number" name="max_uses" :value="old('max_uses')" min="1" placeholder="Kosongkan untuk unlimited" />
                            <p class="text-xs sm:text-sm text-gray-400 mt-1">Biarkan kosong jika tidak ada batas penggunaan</p>
                            <x-input-error :messages="$errors->get('max_uses')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="expires_at" value="Tanggal Kadaluarsa (Opsional)" />
                            <x-text-input id="expires_at" class="block mt-1 w-full text-sm sm:text-base" type="datetime-local" name="expires_at" :value="old('expires_at')" />
                            <p class="text-xs sm:text-sm text-gray-400 mt-1">Biarkan kosong jika kode tidak memiliki masa kadaluarsa</p>
                            <x-input-error :messages="$errors->get('expires_at')" class="mt-2" />
                        </div>

                        <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-4 pt-2">
                            <a href="{{ route('admin.referral-codes.index') }}" class="w-full sm:w-auto px-3 sm:px-4 py-2 bg-slate-800 text-gray-200 rounded-lg hover:bg-slate-700 transition text-center text-sm sm:text-base font-semibold">
                                Batal
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-3 sm:px-4 py-2 btn-gradient text-white rounded-lg transition text-sm sm:text-base font-semibold">
                                Buat Kode Referral
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
