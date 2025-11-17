<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-100 leading-tight">
            Detail Proposal
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8 md:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="mb-3 sm:mb-4 p-3 sm:p-4 bg-emerald-900/30 text-emerald-300 rounded-lg text-sm sm:text-base">
                    {{ session('success') }}
                </div>
            @endif

            @php
                $backUrl = request()->query('back')
                    ?: (request('from') === 'history' ? route('admin.proposals.history') : route('admin.proposals.index'));
            @endphp
            <button onclick="window.history.back()"
                    class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 bg-slate-700/50 hover:bg-slate-600 text-gray-100 rounded-lg transition-colors mb-3 sm:mb-4 text-sm sm:text-base">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="font-semibold">Kembali</span>
            </button>
            <div class="glass-card neon-border overflow-hidden rounded-xl">
                <div class="p-6 text-gray-100">
                    <!-- Header Proposal -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 rounded-xl mb-6">
                        <h1 class="text-2xl font-bold text-white">{{ $proposal->title }}</h1>
                    </div>

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
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center justify-between">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Dokumen Proposal
                            </span>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.proposals.view-document', $proposal) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Buka di Tab Baru
                                </a>
                                <a href="{{ asset('storage/' . $proposal->file_path) }}"
                                   download
                                   class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </h3>

                        <!-- PDF Preview -->
                        <div class="bg-white rounded-lg overflow-hidden" style="height: 600px;">
                            <iframe
                                id="pdfViewer"
                                src="{{ route('admin.proposals.view-document', $proposal) }}"
                                class="w-full h-full border-0"
                                title="Dokumen Proposal PDF"
                                onload="handleIframeLoad()"
                                onerror="handleIframeError()">
                            </iframe>
                            <div id="pdfError" class="hidden p-8 text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-600 mb-4">Preview tidak dapat ditampilkan di browser Anda</p>
                                <a href="{{ route('admin.proposals.view-document', $proposal) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Buka Dokumen di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>

                    <script>
                        function handleIframeLoad() {
                            const iframe = document.getElementById('pdfViewer');
                            try {
                                // Check if iframe loaded successfully
                                const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                                if (iframeDoc.body && iframeDoc.body.innerHTML.trim() === '') {
                                    showError();
                                }
                            } catch (e) {
                                // Cross-origin or permission error - iframe might still work
                                console.log('PDF viewer loaded');
                            }
                        }

                        function handleIframeError() {
                            showError();
                        }

                        function showError() {
                            document.getElementById('pdfViewer').classList.add('hidden');
                            document.getElementById('pdfError').classList.remove('hidden');
                        }

                        // Fallback: Check after 3 seconds if PDF failed to load
                        setTimeout(() => {
                            const iframe = document.getElementById('pdfViewer');
                            if (!iframe.classList.contains('hidden')) {
                                try {
                                    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                                    // If we can access and it's empty or has error, show fallback
                                    if (iframeDoc && (
                                        iframeDoc.body.innerHTML.includes('403') ||
                                        iframeDoc.body.innerHTML.includes('Forbidden') ||
                                        iframeDoc.body.innerHTML.includes('Error')
                                    )) {
                                        showError();
                                    }
                                } catch (e) {
                                    // Can't access iframe content - likely CORS, but PDF might still work
                                }
                            }
                        }, 3000);
                    </script>

                    <!-- Action Buttons -->
                    @if($proposal->status === 'pending')
                    <div class="mt-6 flex gap-3 justify-end border-t border-white/10 pt-4">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
