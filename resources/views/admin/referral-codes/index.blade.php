<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-lg sm:text-xl text-gray-100 leading-tight">
                Kelola Kode Referral
            </h2>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 md:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 sm:mb-6">
                <a href="{{ route('admin.referral-codes.create') }}" class="px-3 sm:px-4 py-2 btn-gradient text-white rounded-lg transition inline-block text-sm sm:text-base font-semibold">
                    + Buat Kode Baru
                </a>
            </div>

            <div class="glass-card overflow-hidden rounded-lg sm:rounded-xl">
                <div class="p-4 sm:p-6 text-gray-100">

                    @if(session('success'))
                        <div class="mb-3 sm:mb-4 p-3 sm:p-4 bg-emerald-900/30 text-emerald-300 rounded-lg text-sm sm:text-base">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Desktop Table View -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-white/10">
                            <thead class="bg-slate-800/60">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kode</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Penggunaan</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Batas Maks</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kadaluarsa</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse ($referralCodes as $code)
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span class="font-mono font-bold text-base lg:text-lg text-white">{{ $code->code }}</span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if($code->is_active && $code->isValid())
                                                <span class="px-2 py-1 text-xs font-semibold text-emerald-300 bg-emerald-900/30 rounded-full">Aktif</span>
                                            @elseif(!$code->is_active)
                                                <span class="px-2 py-1 text-xs font-semibold text-gray-300 bg-white/10 rounded-full">Nonaktif</span>
                                            @elseif($code->expires_at && $code->expires_at->isPast())
                                                <span class="px-2 py-1 text-xs font-semibold text-orange-300 bg-orange-900/30 rounded-full">Expired</span>
                                            @elseif($code->max_uses && $code->used_count >= $code->max_uses)
                                                <span class="px-2 py-1 text-xs font-semibold text-red-300 bg-red-900/30 rounded-full">Penuh</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $code->used_count }} pengguna
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $code->max_uses ?? 'Unlimited' }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $code->expires_at ? $code->expires_at->format('d M Y') : 'Tidak ada' }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.referral-codes.edit', $code) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>

                                                <form action="{{ route('admin.referral-codes.toggle', $code) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-yellow-300 hover:text-yellow-200">
                                                        {{ $code->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.referral-codes.destroy', $code) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kode ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-300 hover:text-red-200">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-gray-400 text-sm">
                                            Belum ada kode referral. <a href="{{ route('admin.referral-codes.create') }}" class="text-indigo-300 hover:underline">Buat kode baru</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="md:hidden space-y-3">
                        @forelse ($referralCodes as $code)
                            <div class="bg-slate-800/30 rounded-lg p-4 border border-white/10">
                                <!-- Kode Referral -->
                                <div class="mb-3">
                                    <span class="font-mono font-bold text-lg text-white">{{ $code->code }}</span>
                                </div>

                                <!-- Status Badge -->
                                <div class="mb-3">
                                    @if($code->is_active && $code->isValid())
                                        <span class="px-2 py-1 text-xs font-semibold text-emerald-300 bg-emerald-900/30 rounded-full">Aktif</span>
                                    @elseif(!$code->is_active)
                                        <span class="px-2 py-1 text-xs font-semibold text-gray-300 bg-white/10 rounded-full">Nonaktif</span>
                                    @elseif($code->expires_at && $code->expires_at->isPast())
                                        <span class="px-2 py-1 text-xs font-semibold text-orange-300 bg-orange-900/30 rounded-full">Expired</span>
                                    @elseif($code->max_uses && $code->used_count >= $code->max_uses)
                                        <span class="px-2 py-1 text-xs font-semibold text-red-300 bg-red-900/30 rounded-full">Penuh</span>
                                    @endif
                                </div>

                                <!-- Info Details -->
                                <div class="space-y-2 mb-3">
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="text-gray-400">Penggunaan:</span>
                                        <span class="text-gray-200">{{ $code->used_count }} pengguna</span>
                                    </div>
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="text-gray-400">Batas Maks:</span>
                                        <span class="text-gray-200">{{ $code->max_uses ?? 'Unlimited' }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="text-gray-400">Kadaluarsa:</span>
                                        <span class="text-gray-200">{{ $code->expires_at ? $code->expires_at->format('d M Y') : 'Tidak ada' }}</span>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex gap-2 pt-2 border-t border-white/10">
                                    <a href="{{ route('admin.referral-codes.edit', $code) }}" class="flex-1 px-3 py-2 bg-indigo-600 text-white text-xs font-semibold rounded text-center hover:bg-indigo-700 transition-colors">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.referral-codes.toggle', $code) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-full px-3 py-2 bg-yellow-600 text-white text-xs font-semibold rounded hover:bg-yellow-700 transition-colors">
                                            {{ $code->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.referral-codes.destroy', $code) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus kode ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-3 py-2 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-400 text-sm">
                                Belum ada kode referral. <a href="{{ route('admin.referral-codes.create') }}" class="text-indigo-300 hover:underline">Buat kode baru</a>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-3 sm:mt-4">
                        {{ $referralCodes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
