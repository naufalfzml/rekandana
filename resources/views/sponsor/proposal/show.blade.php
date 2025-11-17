<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-100 leading-tight">
            Detail Proposal
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <button onclick="window.history.back()"
                    class="inline-flex items-center text-sm sm:text-base text-gray-400 hover:text-gray-200 mb-4 transition-colors duration-200">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </button>

            <div class="glass-card neon-border overflow-hidden rounded-xl">
                <div class="p-4 sm:p-6 md:p-8 text-gray-100">
                    <h1 class="text-2xl sm:text-3xl font-bold mb-2 text-white">{{ $proposal->title }}</h1>
                    
                    <div class="text-sm sm:text-md text-gray-300 mb-4 sm:mb-6 border-b border-white/10 pb-3 sm:pb-4">
                        <p>Diajukan oleh: <span class="font-semibold">{{ $proposal->user->name }}</span></p>
                        <p>Universitas: <span class="font-semibold">{{ $proposal->user->university }}</span></p>
                    </div>

                    <!-- Info Proposal Detail -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 mb-4 sm:mb-6">
                        @if($proposal->kategori)
                        <div class="bg-white/5 p-3 sm:p-4 rounded-lg border border-white/10">
                            <p class="text-xs sm:text-sm text-gray-400">Kategori</p>
                            <p class="text-base sm:text-lg font-semibold text-white">{{ $proposal->kategori }}</p>
                        </div>
                        @endif

                        @if($proposal->bidang)
                        <div class="bg-white/5 p-3 sm:p-4 rounded-lg border border-white/10">
                            <p class="text-xs sm:text-sm text-gray-400">Bidang</p>
                            <p class="text-base sm:text-lg font-semibold text-white">{{ $proposal->bidang }}</p>
                        </div>
                        @endif

                        @if($proposal->penyelenggara)
                        <div class="bg-white/5 p-3 sm:p-4 rounded-lg border border-white/10">
                            <p class="text-xs sm:text-sm text-gray-400">Penyelenggara</p>
                            <p class="text-base sm:text-lg font-semibold text-white">{{ $proposal->penyelenggara }}</p>
                        </div>
                        @endif

                        @if($proposal->tanggal_acara)
                        <div class="bg-white/5 p-3 sm:p-4 rounded-lg border border-white/10">
                            <p class="text-xs sm:text-sm text-gray-400">Tanggal Acara</p>
                            <p class="text-base sm:text-lg font-semibold text-white">{{ \Carbon\Carbon::parse($proposal->tanggal_acara)->format('d F Y') }}</p>
                        </div>
                        @endif

                        <div class="bg-white/5 p-3 sm:p-4 rounded-lg border border-white/10">
                            <p class="text-xs sm:text-sm text-gray-400">Status</p>
                            <p class="text-base sm:text-lg font-semibold text-white capitalize">
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($proposal->status == 'approved') bg-green-500/20 text-green-300
                                    @elseif($proposal->status == 'pending') bg-yellow-500/20 text-yellow-300
                                    @elseif($proposal->status == 'rejected') bg-red-500/20 text-red-300
                                    @else bg-gray-500/20 text-gray-300
                                    @endif">
                                    {{ $proposal->status }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4 sm:mb-6">
                        <h3 class="text-lg sm:text-xl font-bold text-white mb-2 sm:mb-3">Deskripsi Proposal</h3>
                        <div class="prose max-w-none bg-white/5 p-3 sm:p-4 rounded-lg border border-white/10">
                            <p class="text-sm sm:text-base text-gray-300 whitespace-pre-line">{{ $proposal->description }}</p>
                        </div>
                    </div>

                    <!-- Target Pendanaan -->
                    <div class="mt-4 sm:mt-6 bg-gradient-to-r from-indigo-900/30 to-purple-900/30 p-4 sm:p-6 rounded-lg border border-indigo-500/30">
                        <p class="text-base sm:text-lg font-bold text-indigo-300">Target Pendanaan</p>
                        <p class="text-2xl sm:text-3xl font-extrabold text-white mt-2">Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</p>
                    </div>

                    <div class="mt-4 sm:mt-6">
                        <a href="{{ asset('storage/' . $proposal->file_path) }}" target="_blank" class="inline-block px-4 sm:px-6 py-2 btn-ghost text-indigo-300 font-semibold rounded-lg text-sm sm:text-base">
                            Unduh Dokumen Proposal Lengkap
                        </a>
                    </div>

                    <div class="mt-6 sm:mt-8 border-t border-white/10 pt-4 sm:pt-6 flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                        @if(auth()->user()->savedProposals->contains($proposal) && !$hasDealed)
                            <form action="{{ route('sponsor.proposals.unsave', $proposal) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full sm:w-auto px-4 py-2 btn-ghost text-gray-200 font-semibold rounded-lg text-sm sm:text-base">
                                    ✓ Disimpan
                                </button>
                            </form>
                            <form action="{{ route('sponsor.deals.initiate', $proposal) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                <button type="submit" class="w-full sm:w-auto px-6 py-2 btn-gradient text-white font-semibold rounded-lg shadow-md text-sm sm:text-base">
                                    Mulai Deal
                                </button>
                            </form>
                        @elseif(!$hasDealed)
                             <form action="{{ route('sponsor.proposals.save', $proposal) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                <button type="submit" class="w-full sm:w-auto px-4 py-2 btn-ghost text-gray-200 font-semibold rounded-lg text-sm sm:text-base">
                                    + Simpan Proposal
                                </button>
                            </form>
                            <form action="{{ route('sponsor.deals.initiate', $proposal) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                <button type="submit" class="w-full sm:w-auto px-6 py-2 btn-gradient text-white font-semibold rounded-lg shadow-md text-sm sm:text-base">
                                    Mulai Deal
                                </button>
                            </form>
                        @elseif($hasDealed)
                            <a href="{{ route('sponsor.deals.index') }}" class="w-full sm:w-auto text-center px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md text-sm sm:text-base">
                                ✓ Dealed
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
