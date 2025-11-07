<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-100 leading-tight">
            History Proposal yang Disetujui
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8 md:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-4 sm:mb-6">
                <div class="glass-card neon-border p-4 sm:p-6 rounded-lg sm:rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-300 mb-1">Total Approved</p>
                            <p class="text-2xl sm:text-3xl font-bold text-emerald-300">{{ $totalApproved }}</p>
                        </div>
                        <div class="p-2 sm:p-3 bg-emerald-900/30 rounded-full flex-shrink-0">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                @foreach($categoryStats->take(3) as $stat)
                <div class="glass-card neon-border p-4 sm:p-6 rounded-lg sm:rounded-xl">
                    <div class="flex items-center justify-between">
                        <div class="min-w-0 flex-1">
                            <p class="text-xs sm:text-sm text-gray-300 mb-1 truncate">{{ $stat->kategori }}</p>
                            <p class="text-2xl sm:text-3xl font-bold text-blue-300">{{ $stat->total }}</p>
                        </div>
                        <div class="p-2 sm:p-3 bg-blue-900/30 rounded-full flex-shrink-0">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Filter & Search Section -->
            <div class="glass-card neon-border overflow-hidden rounded-lg sm:rounded-xl mb-4 sm:mb-6">
                <div class="p-4 sm:p-6">
                    <form action="{{ route('admin.proposals.history') }}" method="GET" class="space-y-3 sm:space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                            <!-- Search -->
                            <div class="lg:col-span-2">
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Cari judul, nama mahasiswa, atau universitas..."
                                       class="w-full px-3 sm:px-4 py-2 input-dark rounded-lg text-sm sm:text-base">
                            </div>

                            <!-- Category Filter -->
                            <div>
                                <select name="kategori" class="w-full px-3 sm:px-4 py-2 select-dark rounded-lg text-sm sm:text-base">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Field Filter -->
                            <div>
                                <select name="bidang" class="w-full px-3 sm:px-4 py-2 select-dark rounded-lg text-sm sm:text-base">
                                    <option value="">Semua Bidang</option>
                                    @foreach($fields as $field)
                                        <option value="{{ $field }}" {{ request('bidang') == $field ? 'selected' : '' }}>
                                            {{ $field }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                            <!-- Date From -->
                            <div>
                                <input type="date"
                                       name="date_from"
                                       value="{{ request('date_from') }}"
                                       placeholder="Tanggal Dari"
                                       class="w-full px-3 sm:px-4 py-2 input-dark rounded-lg text-sm sm:text-base">
                            </div>

                            <!-- Date To -->
                            <div>
                                <input type="date"
                                       name="date_to"
                                       value="{{ request('date_to') }}"
                                       placeholder="Tanggal Sampai"
                                       class="w-full px-3 sm:px-4 py-2 input-dark rounded-lg text-sm sm:text-base">
                            </div>

                            <!-- Sort -->
                            <div>
                                <select name="sort" class="w-full px-3 sm:px-4 py-2 select-dark rounded-lg text-sm sm:text-base">
                                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                    <option value="alfabetis" {{ request('sort') == 'alfabetis' ? 'selected' : '' }}>A-Z</option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-2">
                                <button type="submit" class="flex-1 px-3 sm:px-4 py-2 btn-gradient text-white rounded-lg font-semibold text-sm sm:text-base">
                                    Filter
                                </button>
                                <a href="{{ route('admin.proposals.history') }}" class="px-3 sm:px-4 py-2 btn-ghost text-gray-200 rounded-lg font-semibold text-sm sm:text-base">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Proposals List -->
            <div class="glass-card neon-border overflow-hidden rounded-lg sm:rounded-xl">
                <div class="p-4 sm:p-6 text-gray-100">
                    <h3 class="text-base sm:text-lg font-medium mb-3 sm:mb-4">Daftar Proposal yang Disetujui ({{ $approvedProposals->total() }})</h3>

                    <!-- Desktop Table View -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-slate-800/50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Proposal</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Mahasiswa</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Target Dana</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Disetujui</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse($approvedProposals as $proposal)
                                    <tr class="hover:bg-slate-800/30 transition-colors">
                                        <td class="px-4 py-4">
                                            <p class="font-semibold text-white">{{ $proposal->title }}</p>
                                            <div class="flex gap-2 mt-1">
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-900/30 text-blue-300">
                                                    {{ $proposal->bidang }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <p class="font-medium text-white">{{ $proposal->user->name }}</p>
                                            <p class="text-sm text-gray-400">{{ $proposal->user->university }}</p>
                                        </td>
                                        <td class="px-4 py-4">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-900/30 text-emerald-300">
                                                {{ $proposal->kategori }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span class="font-semibold text-emerald-300">
                                                Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $proposal->updated_at->format('d M Y') }}
                                            <br>
                                            <span class="text-xs text-gray-400">{{ $proposal->updated_at->diffForHumans() }}</span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <a href="{{ route('admin.proposals.show', ['proposal' => $proposal->id, 'from' => 'history', 'back' => request()->fullUrl()]) }}" class="px-3 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition-colors inline-block">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <p class="text-gray-400 text-lg">Tidak ada proposal yang disetujui</p>
                                                <p class="text-gray-500 text-sm mt-2">Belum ada proposal yang telah disetujui dalam sistem</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile/Tablet Card View -->
                    <div class="lg:hidden space-y-3">
                        @forelse($approvedProposals as $proposal)
                            <div class="bg-slate-800/30 rounded-lg p-4 border border-white/10">
                                <div class="flex justify-between items-start gap-3 mb-3">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-white text-sm mb-2 break-words">{{ $proposal->title }}</h4>
                                        <p class="font-medium text-white text-sm">{{ $proposal->user->name }}</p>
                                        <p class="text-xs text-gray-400 truncate">{{ $proposal->user->university }}</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-900/30 text-blue-300">
                                        {{ $proposal->bidang }}
                                    </span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-900/30 text-emerald-300">
                                        {{ $proposal->kategori }}
                                    </span>
                                </div>

                                <div class="space-y-2 mb-3">
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="text-gray-400">Target Dana:</span>
                                        <span class="font-semibold text-emerald-300">Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="text-gray-400">Disetujui:</span>
                                        <div class="text-right">
                                            <div class="text-gray-300">{{ $proposal->updated_at->format('d M Y') }}</div>
                                            <div class="text-gray-500">{{ $proposal->updated_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('admin.proposals.show', ['proposal' => $proposal->id, 'from' => 'history', 'back' => request()->fullUrl()]) }}" class="block w-full px-3 py-2 bg-blue-600 text-white text-sm font-semibold rounded text-center hover:bg-blue-700 transition-colors">
                                    Lihat Detail
                                </a>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400 mb-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-400 text-sm sm:text-base">Tidak ada proposal yang disetujui</p>
                                <p class="text-gray-500 text-xs sm:text-sm mt-1">Belum ada proposal yang telah disetujui dalam sistem</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($approvedProposals->hasPages())
                        <div class="mt-4 sm:mt-6">
                            {{ $approvedProposals->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const openModals = document.querySelectorAll('.fixed.inset-0.z-\\[70\\]:not(.hidden)');
                openModals.forEach(modal => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });
            }
        });
    </script>
</x-app-layout>
