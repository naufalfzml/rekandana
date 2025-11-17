<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-100 leading-tight">
            Proposal Saya
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8 md:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Quota Info Card -->
            <div class="mb-4 sm:mb-6 glass-card neon-border overflow-hidden rounded-lg sm:rounded-xl">
                <div class="p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-base sm:text-lg font-semibold text-white mb-1 sm:mb-2">Kuota Direct Proposal</h3>
                            <p class="text-xs sm:text-sm text-gray-300">
                                Sisa kuota untuk mengirim proposal langsung ke perusahaan tertentu
                            </p>
                        </div>
                        <div class="text-center w-full sm:w-auto">
                            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 rounded-full {{ auth()->user()->direct_proposal_quota > 0 ? 'bg-blue-900/30 border-2 border-blue-500' : 'bg-red-900/30 border-2 border-red-500' }}">
                                <span class="text-2xl sm:text-3xl font-bold {{ auth()->user()->direct_proposal_quota > 0 ? 'text-blue-300' : 'text-red-300' }}">
                                    {{ auth()->user()->direct_proposal_quota }}
                                </span>
                            </div>
                            @if(auth()->user()->direct_proposal_quota <= 0)
                                <p class="mt-2 text-[11px] sm:text-xs text-gray-400">
                                    💡 Premium coming soon!
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="glass-card neon-border overflow-hidden rounded-lg sm:rounded-xl">
                <div class="p-4 sm:p-6 text-gray-100">
                    <h3 class="text-base sm:text-lg font-medium mb-3 sm:mb-4">Daftar Proposal yang Telah Diajukan</h3>

                    <!-- Desktop Table View -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-slate-800/50">
                                <tr>
                                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Judul Proposal</th>
                                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Tanggal Diajukan</th>
                                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse (auth()->user()->proposals()->latest()->get() as $proposal)
                                    <tr>
                                        <td class="px-4 lg:px-6 py-4 font-medium text-gray-100">{{ $proposal->title }}</td>
                                        <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-gray-300">{{ $proposal->created_at->format('d M Y') }}</td>
                                        <td class="px-4 lg:px-6 py-4 whitespace-nowrap">
                                            @if($proposal->status == 'approved')
                                                @if($proposal->deals->isnotEmpty())
                                                    <span class="px-2 inline-flex text-[11px] sm:text-xs leading-5 font-semibold rounded-full bg-cyan-900/30 text-cyan-300">
                                                        Ada Tawaran
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-[11px] sm:text-xs leading-5 font-semibold rounded-full bg-emerald-900/30 text-emerald-300">
                                                        Disetujui oleh Admin
                                                    </span>
                                                @endif
                                            @elseif($proposal->status == 'rejected')
                                                 <span class="px-2 inline-flex text-[11px] sm:text-xs leading-5 font-semibold rounded-full bg-red-900/30 text-red-300">
                                                    Ditolak oleh Admin
                                                </span>
                                            @else
                                                 <span class="px-2 inline-flex text-[11px] sm:text-xs leading-5 font-semibold rounded-full bg-yellow-900/30 text-yellow-300">
                                                    Pending
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 lg:px-6 py-8 text-center text-gray-400">Kamu belum mengajukan proposal apapun.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="md:hidden space-y-3">
                        @forelse (auth()->user()->proposals()->latest()->get() as $proposal)
                            <div class="bg-slate-800/30 rounded-lg p-4 border border-white/10">
                                <h4 class="font-medium text-gray-100 mb-2 text-sm">{{ $proposal->title }}</h4>
                                <div class="flex items-center justify-between text-xs text-gray-400 mb-2">
                                    <span>{{ $proposal->created_at->format('d M Y') }}</span>
                                </div>
                                <div>
                                    @if($proposal->status == 'approved')
                                        @if($proposal->deals->isnotEmpty())
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-cyan-900/30 text-cyan-300">
                                                Ada Tawaran
                                            </span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-900/30 text-emerald-300">
                                                Disetujui oleh Admin
                                            </span>
                                        @endif
                                    @elseif($proposal->status == 'rejected')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900/30 text-red-300">
                                            Ditolak oleh Admin
                                        </span>
                                    @else
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900/30 text-yellow-300">
                                            Pending
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-400 text-sm">
                                Kamu belum mengajukan proposal apapun.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
