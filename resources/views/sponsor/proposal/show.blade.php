<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Detail Proposal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl">
                <div class="p-6 md:p-8 text-gray-100">
                    <h1 class="text-3xl font-bold mb-2 text-white">{{ $proposal->title }}</h1>
                    
                    <div class="text-md text-gray-300 mb-6 border-b border-white/10 pb-4">
                        <p>Diajukan oleh: <span class="font-semibold">{{ $proposal->user->name }}</span></p>
                        <p>Universitas: <span class="font-semibold">{{ $proposal->user->university }}</span></p>
                    </div>

                    <div class="prose max-w-none">
                        <p>{{ $proposal->description }}</p>
                    </div>

                    <div class="mt-6 bg-indigo-900/20 p-4 rounded-lg">
                        <p class="text-lg font-bold text-indigo-300">Target Pendanaan</p>
                        <p class="text-2xl font-extrabold text-indigo-200">Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</p>
                    </div>
                    
                    <div class="mt-6">
                        <a href="{{ asset('storage/' . $proposal->file_path) }}" target="_blank" class="inline-block px-6 py-2 btn-ghost text-indigo-300 font-semibold rounded-lg">
                            Unduh Dokumen Proposal Lengkap
                        </a>
                    </div>

                    <div class="mt-8 border-t border-white/10 pt-6 flex items-center gap-4">
                         @if(auth()->user()->savedProposals->contains($proposal))
                            <form action="{{ route('sponsor.proposals.unsave', $proposal) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 btn-ghost text-gray-200 font-semibold rounded-lg">
                                    ✓ Disimpan
                                </button>
                            </form>
                        @else
                             <form action="{{ route('sponsor.proposals.save', $proposal) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 btn-ghost text-gray-200 font-semibold rounded-lg">
                                    + Simpan Proposal
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('sponsor.deals.initiate', $proposal) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-6 py-2 btn-gradient text-white font-semibold rounded-lg shadow-md">
                                Mulai Deal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
