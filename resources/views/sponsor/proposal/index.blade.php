<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Cari Proposal
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search & Filter Section -->
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl mb-6 sm:mb-8">
                <div class="p-4 sm:p-6">
                    <div class="flex items-center mb-4 sm:mb-6">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <h3 class="text-base sm:text-lg font-semibold text-white">Cari & Filter Proposal</h3>
                    </div>

                    <form action="{{ route('sponsor.proposals.search') }}" method="GET" id="filter-form">
                        <!-- Search Bar -->
                        <div class="mb-4 sm:mb-6">
                            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                                <div class="flex-1">
                                    <input type="text"
                                        name="search"
                                        value="{{ request('search') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 input-dark rounded-lg transition-all duration-200 text-sm sm:text-base"
                                        placeholder="Cari proposal...">
                                </div>
                                <button type="submit"
                                    class="px-4 py-2.5 sm:px-6 sm:py-3 btn-gradient text-white font-semibold rounded-lg focus:ring-2 focus:ring-indigo-500 transition-all duration-200 flex items-center justify-center text-sm sm:text-base whitespace-nowrap">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Cari
                                </button>
                            </div>
                        </div>

                        <!-- Filter Section -->
                        <div class="border-t border-white/10 pt-4 sm:pt-6">
                            <div class="flex items-center justify-between mb-3 sm:mb-4">
                                <h4 class="text-sm sm:text-md font-semibold text-gray-200 flex items-center">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                                    </svg>
                                    <span class="hidden sm:inline">Filter & Urutkan</span>
                                    <span class="sm:hidden">Filter</span>
                                </h4>
                                <button type="button" id="toggle-filters" class="text-indigo-300 hover:text-indigo-200 text-xs sm:text-sm font-medium transition-colors duration-200 flex items-center">
                                    <span id="filter-toggle-text" class="hidden sm:inline">Tampilkan Filter</span>
                                    <span id="filter-toggle-text-mobile" class="sm:hidden">Tampilkan</span>
                                    <svg id="filter-toggle-icon" class="w-3 h-3 sm:w-4 sm:h-4 ml-1 inline transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>

                            <div id="filter-section" class="hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-4">
                                    <!-- Sort Filter -->
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-1.5 sm:mb-2">Urutkan</label>
                                        <select name="sort" class="w-full px-2.5 py-2 sm:px-3 sm:py-2 select-dark rounded-lg text-sm sm:text-base">
                                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                            <option value="tanggal_acara_terdekat" {{ request('sort') == 'tanggal_acara_terdekat' ? 'selected' : '' }}>Acara Terdekat</option>
                                            <option value="tanggal_acara_terjauh" {{ request('sort') == 'tanggal_acara_terjauh' ? 'selected' : '' }}>Acara Terjauh</option>
                                            <option value="funding_tertinggi" {{ request('sort') == 'funding_tertinggi' ? 'selected' : '' }}>Dana Tertinggi</option>
                                            <option value="funding_terendah" {{ request('sort') == 'funding_terendah' ? 'selected' : '' }}>Dana Terendah</option>
                                            <option value="alfabetis" {{ request('sort') == 'alfabetis' ? 'selected' : '' }}>A-Z</option>
                                        </select>
                                    </div>

                                    <!-- Category Filter -->
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-1.5 sm:mb-2">Kategori</label>
                                        <select name="kategori" class="w-full px-2.5 py-2 sm:px-3 sm:py-2 select-dark rounded-lg text-sm sm:text-base">
                                            <option value="">Semua Kategori</option>
                                            @if(isset($categories))
                                            @foreach($categories as $category)
                                            <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                                                {{ $category }}
                                            </option>
                                            @endforeach
                                            @else
                                            <option value="Teknologi" {{ request('kategori') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                            <option value="Pendidikan" {{ request('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                            <option value="Kesehatan" {{ request('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                            <option value="Lingkungan" {{ request('kategori') == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                                            <option value="Sosial" {{ request('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                            <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            @endif
                                        </select>
                                    </div>

                                    <!-- Field Filter -->
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-1.5 sm:mb-2">Bidang</label>
                                        <select name="bidang" class="w-full px-2.5 py-2 sm:px-3 sm:py-2 select-dark rounded-lg text-sm sm:text-base">
                                            <option value="">Semua Bidang</option>
                                            @if(isset($fields))
                                            @foreach($fields as $field)
                                            <option value="{{ $field }}" {{ request('bidang') == $field ? 'selected' : '' }}>
                                                {{ $field }}
                                            </option>
                                            @endforeach
                                            @else
                                            <option value="AI & Machine Learning" {{ request('bidang') == 'AI & Machine Learning' ? 'selected' : '' }}>AI & Machine Learning</option>
                                            <option value="Web Development" {{ request('bidang') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                            <option value="Mobile Development" {{ request('bidang') == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                                            <option value="Data Science" {{ request('bidang') == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                                            <option value="Cybersecurity" {{ request('bidang') == 'Cybersecurity' ? 'selected' : '' }}>Cybersecurity</option>
                                            <option value="IoT" {{ request('bidang') == 'IoT' ? 'selected' : '' }}>IoT</option>
                                            @endif
                                        </select>
                                    </div>

                                    <!-- Event Date Filter -->
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-1.5 sm:mb-2">Waktu Acara</label>
                                        <select name="tanggal_acara" class="w-full px-2.5 py-2 sm:px-3 sm:py-2 select-dark rounded-lg text-sm sm:text-base">
                                            <option value="">Semua Waktu</option>
                                            <option value="minggu_ini" {{ request('tanggal_acara') == 'minggu_ini' ? 'selected' : '' }}>Minggu Ini</option>
                                            <option value="bulan_ini" {{ request('tanggal_acara') == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
                                            <option value="bulan_depan" {{ request('tanggal_acara') == 'bulan_depan' ? 'selected' : '' }}>Bulan Depan</option>
                                            <option value="tahun_ini" {{ request('tanggal_acara') == 'tahun_ini' ? 'selected' : '' }}>Tahun Ini</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Funding Range Filter -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 mb-4">
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-1.5 sm:mb-2">Dana Minimum (Rp)</label>
                                        <input type="number"
                                            name="funding_min"
                                            value="{{ request('funding_min') }}"
                                            class="w-full px-2.5 py-2 sm:px-3 sm:py-2 input-dark rounded-lg text-sm sm:text-base"
                                            placeholder="0"
                                            min="0">
                                    </div>
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-300 mb-1.5 sm:mb-2">Dana Maksimum (Rp)</label>
                                        <input type="number"
                                            name="funding_max"
                                            value="{{ request('funding_max') }}"
                                            class="w-full px-2.5 py-2 sm:px-3 sm:py-2 input-dark rounded-lg text-sm sm:text-base"
                                            placeholder="100000000"
                                            min="0">
                                    </div>
                                </div>

                                <!-- Filter Actions -->
                                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 pt-3 sm:pt-4 border-t border-white/10">
                                    <button type="submit" class="flex-1 sm:flex-none px-4 py-2 sm:px-6 sm:py-2 btn-gradient text-white font-semibold rounded-lg transition-colors duration-200 flex items-center justify-center text-sm sm:text-base">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                                        </svg>
                                        Terapkan Filter
                                    </button>
                                    <a href="{{ route('sponsor.proposals.index') }}"
                                        class="flex-1 sm:flex-none px-4 py-2 sm:px-6 sm:py-2 btn-ghost text-gray-200 font-semibold rounded-lg transition-colors duration-200 flex items-center justify-center text-sm sm:text-base">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Reset Filter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Active Filters Display -->
                    @if(request()->hasAny(['search', 'kategori', 'bidang', 'tanggal_acara', 'funding_min', 'funding_max', 'sort']))
                    <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-white/10">
                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
                            <span class="text-xs sm:text-sm font-medium text-gray-200">Filter aktif:</span>

                            @if(request('search'))
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-indigo-900/30 text-indigo-300">
                                <span class="hidden sm:inline">Pencarian: </span>"{{ \Illuminate\Support\Str::limit(request('search'), 20) }}"
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-1.5 sm:ml-2 hover:text-indigo-300 text-sm">×</a>
                            </span>
                            @endif

                            @if(request('kategori'))
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-emerald-900/30 text-emerald-300">
                                <span class="hidden sm:inline">Kategori: </span>{{ request('kategori') }}
                                <a href="{{ request()->fullUrlWithQuery(['kategori' => null]) }}" class="ml-1.5 sm:ml-2 hover:text-emerald-300 text-sm">×</a>
                            </span>
                            @endif

                            @if(request('bidang'))
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-purple-900/30 text-purple-300">
                                <span class="hidden sm:inline">Bidang: </span>{{ \Illuminate\Support\Str::limit(request('bidang'), 15) }}
                                <a href="{{ request()->fullUrlWithQuery(['bidang' => null]) }}" class="ml-1.5 sm:ml-2 hover:text-purple-300 text-sm">×</a>
                            </span>
                            @endif

                            @if(request('tanggal_acara'))
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-yellow-900/30 text-yellow-300">
                                <span class="hidden sm:inline">Waktu: </span>{{ ucfirst(str_replace('_', ' ', request('tanggal_acara'))) }}
                                <a href="{{ request()->fullUrlWithQuery(['tanggal_acara' => null]) }}" class="ml-1.5 sm:ml-2 hover:text-yellow-300 text-sm">×</a>
                            </span>
                            @endif

                            @if(request('funding_min') || request('funding_max'))
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-red-900/30 text-red-300">
                                <span class="hidden sm:inline">Dana: </span>
                                @if(request('funding_min'))Rp {{ number_format(request('funding_min'), 0, ',', '.') }}@endif
                                @if(request('funding_min') && request('funding_max')) - @endif
                                @if(request('funding_max'))Rp {{ number_format(request('funding_max'), 0, ',', '.') }}@endif
                                <a href="{{ request()->fullUrlWithQuery(['funding_min' => null, 'funding_max' => null]) }}" class="ml-1.5 sm:ml-2 hover:text-red-300 text-sm">×</a>
                            </span>
                            @endif

                            @if(request('sort') && request('sort') != 'terbaru')
                            <span class="inline-flex items-center px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-indigo-900/30 text-indigo-300">
                                <span class="hidden sm:inline">Urutan: </span>{{ ucfirst(str_replace('_', ' ', request('sort'))) }}
                                <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}" class="ml-1.5 sm:ml-2 hover:text-indigo-300 text-sm">×</a>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Results Section -->
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl">
                <div class="p-4 sm:p-6">
                    <!-- Results Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4 sm:mb-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6 mr-2 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <h3 class="text-base sm:text-lg font-semibold text-white">
                                @if(request()->hasAny(['search', 'kategori', 'bidang', 'tanggal_acara', 'funding_min', 'funding_max']))
                                <span class="hidden sm:inline">Hasil Filter ({{ $proposals->total() }} proposal)</span>
                                <span class="sm:hidden">Hasil ({{ $proposals->total() }})</span>
                                @else
                                <span class="hidden sm:inline">Semua Proposal Tersedia ({{ $proposals->total() }} proposal)</span>
                                <span class="sm:hidden">Semua Proposal ({{ $proposals->total() }})</span>
                                @endif
                            </h3>
                        </div>

                        @if($proposals->count() > 0)
                        <div class="text-xs sm:text-sm text-gray-400">
                            <span class="hidden sm:inline">Menampilkan </span>{{ $proposals->firstItem() }}-{{ $proposals->lastItem() }} dari {{ $proposals->total() }}<span class="hidden sm:inline"> proposal</span>
                        </div>
                        @endif
                    </div>

                    <!-- Proposals Grid -->
                    @if($proposals->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        @foreach ($proposals as $proposal)
                        <x-proposal-card :proposal="$proposal" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 sm:mt-8">
                        {{ $proposals->links() }}
                    </div>
                    @else
                    <!-- Empty State -->
                    <div class="text-center py-8 sm:py-12">
                        <div class="mx-auto w-16 h-16 sm:w-24 sm:h-24 bg-white/10 rounded-full flex items-center justify-center mb-3 sm:mb-4">
                            <svg class="w-8 h-8 sm:w-12 sm:h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        @if(request()->hasAny(['search', 'kategori', 'bidang', 'tanggal_acara', 'funding_min', 'funding_max']))
                        <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Tidak ada proposal ditemukan</h3>
                        <p class="text-sm sm:text-base text-gray-300 mb-3 sm:mb-4 px-4">
                            Tidak ada proposal yang cocok dengan filter yang Anda pilih.
                        </p>
                        <div class="space-y-2">
                            <p class="text-xs sm:text-sm text-gray-400">Coba ubah filter atau:</p>
                            <a href="{{ route('sponsor.proposals.index') }}"
                                class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 btn-gradient text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                                Lihat Semua Proposal
                            </a>
                        </div>
                        @else
                        <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Belum ada proposal tersedia</h3>
                        <p class="text-sm sm:text-base text-gray-300 px-4">
                            Saat ini belum ada proposal yang tersedia untuk dilihat.
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleFiltersBtn = document.getElementById('toggle-filters');
            const filterSection = document.getElementById('filter-section');
            const filterToggleText = document.getElementById('filter-toggle-text');
            const filterToggleTextMobile = document.getElementById('filter-toggle-text-mobile');
            const filterToggleIcon = document.getElementById('filter-toggle-icon');
            const filterForm = document.getElementById('filter-form');

            // Toggle filter section
            toggleFiltersBtn.addEventListener('click', function() {
                const isHidden = filterSection.classList.contains('hidden');

                if (isHidden) {
                    filterSection.classList.remove('hidden');
                    if (filterToggleText) filterToggleText.textContent = 'Sembunyikan Filter';
                    if (filterToggleTextMobile) filterToggleTextMobile.textContent = 'Sembunyikan';
                    filterToggleIcon.style.transform = 'rotate(180deg)';
                } else {
                    filterSection.classList.add('hidden');
                    if (filterToggleText) filterToggleText.textContent = 'Tampilkan Filter';
                    if (filterToggleTextMobile) filterToggleTextMobile.textContent = 'Tampilkan';
                    filterToggleIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Show filters if any filter is active
            const hasActiveFilters = {{ request()->hasAny(['kategori', 'bidang', 'tanggal_acara', 'funding_min', 'funding_max', 'sort']) ? 'true' : 'false' }};
            if (hasActiveFilters) {
                filterSection.classList.remove('hidden');
                if (filterToggleText) filterToggleText.textContent = 'Sembunyikan Filter';
                if (filterToggleTextMobile) filterToggleTextMobile.textContent = 'Sembunyikan';
                filterToggleIcon.style.transform = 'rotate(180deg)';
            }

            // Auto-submit form when filter changes
            const filterInputs = filterForm.querySelectorAll('select[name="sort"], select[name="kategori"], select[name="bidang"], select[name="tanggal_acara"]');
            filterInputs.forEach(input => {
                input.addEventListener('change', function() {
                    filterForm.submit();
                });
            });

            // Format number inputs
            const numberInputs = filterForm.querySelectorAll('input[type="number"]');
            numberInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value) {
                        // Optional: Format number with thousands separator
                        const value = parseInt(this.value);
                        if (!isNaN(value)) {
                            this.setAttribute('data-value', value);
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>