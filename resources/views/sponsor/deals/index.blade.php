<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Proposal Dealed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl">
                <div class="p-6 text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Proposal Dalam Proses Deal</h3>

                    @if($dealedProposals->isEmpty())
                        <div class="text-center py-12">
                            <p class="text-lg text-gray-400">Anda belum memulai deal dengan proposal manapun.</p>
                            <a href="{{ route('sponsor.proposals.index') }}" class="inline-block mt-4 px-4 py-2 btn-gradient font-semibold rounded-lg shadow-md">
                                Cari Proposal Sekarang
                            </a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($dealedProposals as $proposal)
                                <div class="bg-gray-800/50 p-4 rounded-lg border border-white/10">
                                    <h4 class="font-bold text-lg text-white mb-2">{{ $proposal->title }}</h4>
                                    <p class="text-sm text-gray-400 mb-3">oleh {{ $proposal->user->name }}</p>

                                    <div class="bg-gradient-to-r from-green-900/30 to-emerald-900/30 p-3 rounded-lg border border-green-500/30 mb-3">
                                        <p class="text-xs text-green-300 mb-1">Narahubung</p>
                                        @if($proposal->user->no_hp)
                                            <p class="text-sm font-semibold text-white">
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $proposal->user->no_hp) }}"
                                                   target="_blank"
                                                   class="text-green-300 hover:text-green-200 flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                                    </svg>
                                                    {{ $proposal->user->no_hp }}
                                                </a>
                                            </p>
                                            <p class="text-xs text-gray-400 mt-1">Email: {{ $proposal->user->email }}</p>
                                        @else
                                            <p class="text-sm text-yellow-300">Belum tersedia</p>
                                            <p class="text-xs text-gray-400 mt-1">Email: {{ $proposal->user->email }}</p>
                                        @endif
                                    </div>

                                    <a href="{{ route('sponsor.proposals.show', $proposal) }}"
                                       class="text-indigo-400 hover:text-indigo-300 text-sm inline-flex items-center gap-1">
                                        Lihat Detail
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $dealedProposals->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>