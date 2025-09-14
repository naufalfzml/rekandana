<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cari Proposal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Cari Proposal yang Sesuai</h3>
                    </div>
                    
                    
                    <form action="{{ route('sponsor.proposals.search') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   placeholder="Cari berdasarkan judul, deskripsi, kategori, bidang, atau penyelenggara">
                        </div>
                        <button type="submit" 
                                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cari
                        </button>
                    </form>
                    
                    @if(request('search'))
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-sm text-gray-600">
                                Hasil pencarian untuk: <span class="font-semibold text-blue-600">"{{ request('search') }}"</span>
                            </p>
                            <a href="{{ route('sponsor.proposals.index') }}" 
                               class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                                Hapus filter
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Results Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Results Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-800">
                                @if(request('search'))
                                    Hasil Pencarian ({{ $proposals->total() }} proposal)
                                @else
                                    Semua Proposal Tersedia ({{ $proposals->total() }} proposal)
                                @endif
                            </h3>
                        </div>
                        
                        @if($proposals->count() > 0)
                            <div class="text-sm text-gray-500">
                                Menampilkan {{ $proposals->firstItem() }}-{{ $proposals->lastItem() }} dari {{ $proposals->total() }} proposal
                            </div>
                        @endif
                    </div>

                    <!-- Proposals Grid -->
                    @if($proposals->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($proposals as $proposal)
                                <x-proposal-card :proposal="$proposal" />
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $proposals->links() }}
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            @if(request('search'))
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Tidak ada proposal ditemukan</h3>
                                <p class="text-gray-600 mb-4">
                                    Tidak ada proposal yang cocok dengan pencarian <span class="font-semibold">"{{ request('search') }}"</span>
                                </p>
                                <div class="space-y-2">
                                    <p class="text-sm text-gray-500">Coba cari dengan kata kunci lain atau:</p>
                                    <a href="{{ route('sponsor.proposals.index') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        Lihat Semua Proposal
                                    </a>
                                </div>
                            @else
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum ada proposal tersedia</h3>
                                <p class="text-gray-600">
                                    Saat ini belum ada proposal yang tersedia untuk dilihat.
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>