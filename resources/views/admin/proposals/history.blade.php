<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            History Proposal yang Disetujui
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="glass-card neon-border p-6 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-300 mb-1">Total Approved</p>
                            <p class="text-3xl font-bold text-emerald-300">{{ $totalApproved }}</p>
                        </div>
                        <div class="p-3 bg-emerald-900/30 rounded-full">
                            <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                @foreach($categoryStats->take(3) as $stat)
                <div class="glass-card neon-border p-6 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-300 mb-1">{{ $stat->kategori }}</p>
                            <p class="text-3xl font-bold text-blue-300">{{ $stat->total }}</p>
                        </div>
                        <div class="p-3 bg-blue-900/30 rounded-full">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Filter & Search Section -->
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl mb-6">
                <div class="p-6">
                    <form action="{{ route('admin.proposals.history') }}" method="GET" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Search -->
                            <div class="lg:col-span-2">
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Cari judul, nama mahasiswa, atau universitas..."
                                       class="w-full px-4 py-2 input-dark rounded-lg">
                            </div>

                            <!-- Category Filter -->
                            <div>
                                <select name="kategori" class="w-full px-4 py-2 select-dark rounded-lg">
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
                                <select name="bidang" class="w-full px-4 py-2 select-dark rounded-lg">
                                    <option value="">Semua Bidang</option>
                                    @foreach($fields as $field)
                                        <option value="{{ $field }}" {{ request('bidang') == $field ? 'selected' : '' }}>
                                            {{ $field }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <!-- Date From -->
                            <div>
                                <input type="date"
                                       name="date_from"
                                       value="{{ request('date_from') }}"
                                       placeholder="Tanggal Dari"
                                       class="w-full px-4 py-2 input-dark rounded-lg">
                            </div>

                            <!-- Date To -->
                            <div>
                                <input type="date"
                                       name="date_to"
                                       value="{{ request('date_to') }}"
                                       placeholder="Tanggal Sampai"
                                       class="w-full px-4 py-2 input-dark rounded-lg">
                            </div>

                            <!-- Sort -->
                            <div>
                                <select name="sort" class="w-full px-4 py-2 select-dark rounded-lg">
                                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                    <option value="alfabetis" {{ request('sort') == 'alfabetis' ? 'selected' : '' }}>A-Z</option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-2">
                                <button type="submit" class="flex-1 px-4 py-2 btn-gradient text-white rounded-lg font-semibold">
                                    Filter
                                </button>
                                <a href="{{ route('admin.proposals.history') }}" class="px-4 py-2 btn-ghost text-gray-200 rounded-lg font-semibold">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Proposals List -->
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl">
                <div class="p-6 text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Daftar Proposal yang Disetujui ({{ $approvedProposals->total() }})</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-slate-800/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Proposal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Mahasiswa</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Target Dana</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Disetujui</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse($approvedProposals as $proposal)
                                    <tr x-data="{ modalOpen: false }" class="hover:bg-slate-800/30 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="font-semibold text-white">{{ $proposal->title }}</p>
                                            <div class="flex gap-2 mt-1">
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-900/30 text-blue-300">
                                                    {{ $proposal->bidang }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class="font-medium text-white">{{ $proposal->user->name }}</p>
                                            <p class="text-sm text-gray-400">{{ $proposal->user->university }}</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-900/30 text-emerald-300">
                                                {{ $proposal->kategori }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-semibold text-emerald-300">
                                                Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ $proposal->updated_at->format('d M Y') }}
                                            <br>
                                            <span class="text-xs text-gray-400">{{ $proposal->updated_at->diffForHumans() }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button @click="modalOpen = true" class="px-3 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition-colors">
                                                Lihat Detail
                                            </button>
                                        </td>

                                        <!-- Modal -->
                                        <div x-show="modalOpen"
                                             style="display:none;"
                                             x-on:keydown.escape.window="modalOpen = false"
                                             x-teleport="body"
                                             class="fixed inset-0 z-[70] flex items-center justify-center p-4">

                                             <!-- Background Overlay -->
                                             <div x-show="modalOpen" x-transition.opacity @click="modalOpen = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

                                             <!-- Modal Content -->
                                             <div x-show="modalOpen" x-transition
                                                  @click.outside="modalOpen = false"
                                                  class="relative glass-card text-gray-100 rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden">

                                                  <!-- Modal Header -->
                                                  <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                                                      <div class="flex items-center justify-between">
                                                          <h2 class="text-xl font-bold text-white">{{ $proposal->title }}</h2>
                                                          <button @click="modalOpen = false"
                                                                  class="text-white hover:text-gray-200 transition-colors duration-200">
                                                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                              </svg>
                                                          </button>
                                                      </div>
                                                  </div>

                                                  <!-- Modal Body -->
                                                  <div class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]">
                                                      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                                                          <!-- Left Column -->
                                                          <div class="space-y-4">
                                                              <div class="bg-slate-800/60 border border-slate-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Informasi Pengaju</h3>
                                                                  <div class="space-y-2">
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Nama:</span>
                                                                          <span class="font-medium">{{ $proposal->user->name }}</span>
                                                                      </div>
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Universitas:</span>
                                                                          <span class="font-medium">{{ $proposal->user->university }}</span>
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                              <div class="bg-slate-800/60 border border-slate-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Kategori & Bidang</h3>
                                                                  <div class="space-y-2">
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Kategori:</span>
                                                                          <span class="font-medium">{{ $proposal->kategori }}</span>
                                                                      </div>
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Bidang:</span>
                                                                          <span class="font-medium">{{ $proposal->bidang }}</span>
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                              <div class="bg-slate-800/60 border border-slate-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Detail Acara</h3>
                                                                  <div class="space-y-2">
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Tanggal:</span>
                                                                          <span class="font-medium">{{ $proposal->tanggal_acara }}</span>
                                                                      </div>
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Penyelenggara:</span>
                                                                          <span class="font-medium">{{ $proposal->penyelenggara }}</span>
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                              <div class="bg-emerald-900/20 border border-emerald-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Status Approval</h3>
                                                                  <div class="space-y-2">
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Disetujui pada:</span>
                                                                          <span class="font-medium text-emerald-300">{{ $proposal->updated_at->format('d M Y H:i') }}</span>
                                                                      </div>
                                                                      <div class="flex justify-between">
                                                                          <span class="text-slate-300">Status:</span>
                                                                          <span class="px-2 py-1 rounded-full text-xs font-semibold bg-emerald-900/30 text-emerald-300">Approved</span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>

                                                          <!-- Right Column -->
                                                          <div class="space-y-4">
                                                              <div class="bg-gradient-to-br from-indigo-900/20 to-purple-900/20 border border-slate-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Deskripsi Proposal</h3>
                                                                  <p class="text-slate-200 leading-relaxed">{{ $proposal->description }}</p>
                                                              </div>

                                                              <div class="bg-gradient-to-br from-emerald-900/20 to-teal-900/20 border border-slate-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Target Pendanaan</h3>
                                                                  <div class="text-center">
                                                                      <span class="text-3xl font-bold text-emerald-300">Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</span>
                                                                  </div>
                                                              </div>

                                                              <div class="bg-slate-800/60 border border-slate-700 rounded-lg p-4">
                                                                  <h3 class="text-lg font-semibold text-white mb-3">Link Sosial Media</h3>
                                                                  @php
                                                                      $socialLink = $proposal->link_sosmed;
                                                                      if (!empty($socialLink) && !str_starts_with($socialLink, 'http://') && !str_starts_with($socialLink, 'https://')) {
                                                                          $socialLink = 'https://' . $socialLink;
                                                                      }
                                                                  @endphp
                                                                  @if(!empty($socialLink))
                                                                      <a href="{{ $socialLink }}"
                                                                         target="_blank"
                                                                         rel="noopener noreferrer"
                                                                         class="inline-flex items-center text-indigo-300 hover:text-indigo-200">
                                                                          {{ $proposal->link_sosmed }}
                                                                      </a>
                                                                  @else
                                                                      <span class="text-slate-400 italic">Tidak ada link</span>
                                                                  @endif
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <!-- Document -->
                                                      <div class="mt-6 bg-indigo-900/20 rounded-lg p-4">
                                                          <h3 class="text-lg font-semibold text-white mb-3">Dokumen Proposal</h3>
                                                          <a href="{{ asset('storage/' . $proposal->file_path) }}"
                                                             target="_blank"
                                                             class="inline-flex items-center px-4 py-2 btn-gradient text-white rounded-lg">
                                                              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                              </svg>
                                                              Lihat Dokumen
                                                          </a>
                                                      </div>
                                                  </div>
                                             </div>
                                        </div>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
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

                    <!-- Pagination -->
                    @if($approvedProposals->hasPages())
                        <div class="mt-6">
                            {{ $approvedProposals->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
