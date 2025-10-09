<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Moderasi Proposal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card neon-border overflow-hidden sm:rounded-xl">
                <div class="p-6 text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Proposal Menunggu Persetujuan</h3>

                    <!-- Menampilkan pesan sukses -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-emerald-900/30 text-emerald-300 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="space-y-4">
                        @forelse ($pendingProposals as $proposal)
                            <div x-data="{ modalOpen : false }" class="border border-white/10 p-4 rounded-lg hover:bg-slate-800/30 transition-colors">
                                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                    <!-- Info Proposal -->
                                    <div class="flex-1">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-bold text-lg text-white mb-1">{{ $proposal->title }}</h4>
                                                <div class="flex items-center gap-2 mb-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                    <p class="text-sm text-gray-300">{{ $proposal->user->name }} • {{ $proposal->user->university }}</p>
                                                </div>
                                                <div class="flex flex-wrap gap-2">
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-900/30 text-blue-300">
                                                        {{ $proposal->kategori }}
                                                    </span>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-900/30 text-emerald-300">
                                                        {{ $proposal->bidang }}
                                                    </span>
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-900/30 text-purple-300">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                        </svg>
                                                        Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol Aksi -->
                                    <div class="flex gap-2 flex-shrink-0">
                                        <button @click="modalOpen = true" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Detail
                                        </button>
                                        <form action="{{ route('admin.proposals.approve', $proposal) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui proposal ini?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition-colors w-full sm:w-auto">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.proposals.reject', $proposal) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menolak proposal ini?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition-colors w-full sm:w-auto">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                
                                <div x-show="modalOpen" 
                                     style="display:none;" 
                                     x-on:keydown.escape.window="modalOpen = false"
                                     x-teleport="body"
                                     class="fixed inset-0 z-[70] flex items-center justify-center p-4">
<!-- Background Gelap (Overlay) -->
                                     <div x-show="modalOpen" x-transition.opacity @click="modalOpen = false" class="fixed inset-0 bg-black bg-opacity-50"></div>
                                     
                                     
                                     <!-- Konten Popup -->
                                     <div x-show="modalOpen" x-transition
                                          @click.outside="modalOpen = false"
                                          class="relative glass-card text-gray-100 rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden">

                                          <!-- Modal Header -->
                                          <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                                              <div class="flex items-center justify-between">
                                                  <h2 class="text-xl font-bold text-white text-center w-full">{{ $proposal->title }}</h2>
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
                                                  
                                                  <!-- Left Column - Basic Info -->
                                                  <div class="space-y-4">
                                                      <div class="bg-slate-800/60 border border-slate-700 rounded-lg p-4">
                                                          <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                              <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                              </svg>
                                                              Informasi Pengaju
                                                          </h3>
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
                                                          <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                              <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                              </svg>
                                                              Kategori & Bidang
                                                          </h3>
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
                                                          <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                              <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                              </svg>
                                                              Detail Acara
                                                          </h3>
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
                                                  </div>

                                                  <!-- Right Column - Description & Funding -->
                                                  <div class="space-y-4">
                                                      <div class="bg-gradient-to-br from-indigo-900/20 to-purple-900/20 border border-slate-700 rounded-lg p-4">
                                                          <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                              <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                              </svg>
                                                              Deskripsi Proposal
                                                          </h3>
                                                          <p class="text-slate-200 leading-relaxed">{{ $proposal->description }}</p>
                                                      </div>

                                                      <div class="bg-gradient-to-br from-emerald-900/20 to-teal-900/20 border border-slate-700 rounded-lg p-4">
                                                          <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                              <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                              </svg>
                                                              Target Pendanaan
                                                          </h3>
                                                          <div class="text-center">
                                                              <span class="text-3xl font-bold text-emerald-300">Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</span>
                                                          </div>
                                                      </div>

                                                      <div class="bg-slate-800/60 border border-slate-700 rounded-lg p-4">
                                                          <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                              <svg class="w-5 h-5 mr-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                                              </svg>
                                                              Link Sosial Media
                                                          </h3>
                                                          @php
                                                              $socialLink = $proposal->link_sosmed;
                                                              // Pastikan URL memiliki protocol
                                                              if (!empty($socialLink) && !str_starts_with($socialLink, 'http://') && !str_starts_with($socialLink, 'https://')) {
                                                                  $socialLink = 'https://' . $socialLink;
                                                              }
                                                          @endphp
                                                          @if(!empty($socialLink))
                                                              <a href="{{ $socialLink }}" 
                                                                 target="_blank" 
                                                                 rel="noopener noreferrer"
                                                                 class="inline-flex items-center text-indigo-300 hover:text-indigo-200 transition-colors duration-200">
                                                                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                                  </svg>
                                                                  {{ $proposal->link_sosmed }}
                                                              </a>
                                                          @else
                                                              <span class="text-slate-400 italic">Tidak ada link sosial media</span>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                              <!-- Document Section -->
                                              <div class="mt-6 bg-indigo-900/20 rounded-lg p-4">
                                                  <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                                                      <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                      </svg>
                                                      Dokumen Proposal
                                                  </h3>
                                                  <a href="{{ asset('storage/' . $proposal->file_path) }}"
                                                     target="_blank"
                                                     class="inline-flex items-center px-4 py-2 btn-gradient text-white rounded-lg transition-colors duration-200">
                                                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                      </svg>
                                                      Lihat Dokumen
                                                  </a>
                                              </div>

                                              <!-- Action Buttons in Modal -->
                                              <div class="mt-6 flex gap-3 justify-end border-t border-white/10 pt-4">
                                                  <button @click="modalOpen = false" class="px-6 py-2 btn-ghost text-gray-200 rounded-lg font-semibold">
                                                      Tutup
                                                  </button>
                                                  <form action="{{ route('admin.proposals.reject', $proposal) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menolak proposal ini?')">
                                                      @csrf
                                                      @method('PUT')
                                                      <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 font-semibold transition-colors">
                                                          <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                          </svg>
                                                          Tolak
                                                      </button>
                                                  </form>
                                                  <form action="{{ route('admin.proposals.approve', $proposal) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui proposal ini?')">
                                                      @csrf
                                                      @method('PUT')
                                                      <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold transition-colors">
                                                          <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                          </svg>
                                                          Setujui
                                                      </button>
                                                  </form>
                                              </div>
                                          </div>
                                     </div>
                                </div>

                            </div>
                        @empty
                            <p class="text-gray-400">Tidak ada proposal yang menunggu persetujuan saat ini.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
