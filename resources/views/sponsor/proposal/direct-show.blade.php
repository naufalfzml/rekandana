<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Detail Proposal Langsung
        </h2>
    </x-slot>

    @php
        $proposalEntity = isset($invitation) && $invitation && $invitation->proposal ? $invitation->proposal : ($proposal ?? null);
    @endphp

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl">
                <div class="p-6 md:p-8 text-gray-100">
                    @if($proposalEntity)
                        <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white">{{ $proposalEntity->title }}</h1>

                        <div class="text-sm md:text-md text-gray-300 mb-6 border-b border-white/10 pb-4">
                            @if($proposalEntity->user)
                                <p>Diajukan oleh: <span class="font-semibold">{{ $proposalEntity->user->name }}</span></p>
                                @if(!empty($proposalEntity->user->university))
                                    <p>Universitas: <span class="font-semibold">{{ $proposalEntity->user->university }}</span></p>
                                @endif
                            @endif
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            @if(!empty($proposalEntity->kategori))
                                <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                                    <p class="text-sm text-gray-400">Kategori</p>
                                    <p class="text-lg font-semibold text-white">{{ $proposalEntity->kategori }}</p>
                                </div>
                            @endif
                            @if(!empty($proposalEntity->bidang))
                                <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                                    <p class="text-sm text-gray-400">Bidang</p>
                                    <p class="text-lg font-semibold text-white">{{ $proposalEntity->bidang }}</p>
                                </div>
                            @endif
                            @if(!empty($proposalEntity->penyelenggara))
                                <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                                    <p class="text-sm text-gray-400">Penyelenggara</p>
                                    <p class="text-lg font-semibold text-white">{{ $proposalEntity->penyelenggara }}</p>
                                </div>
                            @endif
                            @if(!empty($proposalEntity->tanggal_acara))
                                <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                                    <p class="text-sm text-gray-400">Tanggal Acara</p>
                                    <p class="text-lg font-semibold text-white">{{ \Carbon\Carbon::parse($proposalEntity->tanggal_acara)->format('d F Y') }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-3">Deskripsi Proposal</h3>
                            <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                                <p class="text-gray-300 whitespace-pre-line text-sm md:text-base">{{ $proposalEntity->description }}</p>
                            </div>
                        </div>

                        <div class="mt-6 bg-gradient-to-r from-indigo-900/30 to-purple-900/30 p-6 rounded-lg border border-indigo-500/30">
                            <p class="text-lg font-bold text-indigo-300">Target Pendanaan</p>
                            <p class="text-2xl md:text-3xl font-extrabold text-white mt-2">Rp {{ number_format($proposalEntity->funding_goal, 0, ',', '.') }}</p>
                        </div>

                        @if(!empty($proposalEntity->file_path))
                            <div class="mt-6">
                                <a href="{{ asset('storage/' . $proposalEntity->file_path) }}" target="_blank" class="inline-block px-6 py-2 btn-ghost text-indigo-300 font-semibold rounded-lg">
                                    Unduh Dokumen Proposal Lengkap
                                </a>
                            </div>
                        @endif

                        <div class="mt-8 border-t border-white/10 pt-6 flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                            @if(isset($hasDealed) && $hasDealed)
                                <a href="{{ route('sponsor.deals.index') }}" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md text-center">
                                    ✓ Dealed
                                </a>
                            @else
                                @if(auth()->check() && $proposalEntity && method_exists(auth()->user(), 'savedProposals') && auth()->user()->savedProposals->contains($proposalEntity))
                                    <form action="{{ route('sponsor.proposals.unsave', $proposalEntity) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 btn-ghost text-gray-200 font-semibold rounded-lg w-full sm:w-auto">✓ Disimpan</button>
                                    </form>
                                @else
                                    @if($proposalEntity)
                                        <form action="{{ route('sponsor.proposals.save', $proposalEntity) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 btn-ghost text-gray-200 font-semibold rounded-lg w-full sm:w-auto">+ Simpan Proposal</button>
                                        </form>
                                    @endif
                                @endif

                                @if($proposalEntity)
                                    <form action="{{ route('sponsor.deals.initiate', $proposalEntity) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-6 py-2 btn-gradient text-white font-semibold rounded-lg shadow-md w-full sm:w-auto">Mulai Deal</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-300">Data proposal tidak ditemukan.</p>
                            <a href="{{ route('sponsor.proposals.index') }}" class="mt-3 inline-block px-4 py-2 btn-gradient text-white rounded-lg">Kembali ke daftar</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
