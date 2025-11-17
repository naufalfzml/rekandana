<!DOCTYPE html>
<html lang="id" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekandana - Platform Sponsorship</title>
    @vite('resources/css/app.css')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-app text-gray-100 overflow-x-hidden">
    @include('layouts.navigation')
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative">
        <!-- Decorative orbs -->
        <div class="orb orb--violet w-64 h-64 -z-10 absolute" style="top:-40px; right:-80px;"></div>
        <div class="orb orb--cyan w-72 h-72 -z-10 absolute" style="bottom:-60px; left:-80px;"></div>
        <div class="orb orb--pink w-56 h-56 -z-10 absolute" style="top:30%; left:35%;"></div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-8">
                <!-- Badge -->
                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm badge-soft">
                    <i class="fas fa-check-circle mr-2 opacity-90"></i>
                    Platform Terbaik untuk Sponsorship di Indonesia
                </div>

                <!-- Main Heading -->
                <div class="space-y-4">
                    <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight tracking-tight">
                        Hubungkan <span class="text-gradient">Proposal</span><br>
                        dengan <span class="text-gradient">Sponsor</span><br>
                        <span class="text-gray-100">Terbaik</span>
                    </h1>
                    
                    <p class="text-xl text-gray-300 leading-relaxed">
                        Platform yang menghubungkan mahasiswa dengan
                        perusahaan untuk menciptakan kolaborasi yang saling
                        menguntungkan.
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}" class="btn-gradient px-8 py-4 rounded-xl font-semibold text-lg hover:opacity-90 transition flex items-center justify-center shadow-xl">
                        Mulai Sekarang
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Right Content - Image/Illustration -->
            <div class="relative">
                <div class="glass-card inner-outline rounded-xl card-hover">
                    <!-- Placeholder for illustration -->
                        <img src="{{ asset('storage/shake-hand.png') }}" alt="" 
                        class="bg-slate-900/40 rounded-xl shadow-lg flex items-center justify-center">
                </div>
                
                <div class="absolute -bottom-6 -left-6 w-14 h-14 rounded-xl flex items-center justify-center shadow-xl -rotate-6" style="background:linear-gradient(135deg,#22c55e,#10b981)">
                    <i class="fas fa-check text-white"></i>
                </div>
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section class="py-20" id="fitur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Fitur Unggulan</h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Dilengkapi dengan fitur-fitur canggih untuk memaksimalkan peluang keberhasilan Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center p-8 glass-card rounded-xl card-hover border border-white/10">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-paper-plane text-cyan-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Direct Proposal</h3>
                    <p class="text-gray-300">Kirim proposal langsung ke sponsor pilihan Anda dengan sistem direct yang eksklusif</p>
                </div>

                <div class="text-center p-8 glass-card rounded-xl card-hover border border-white/10">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-filter text-violet-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Advanced Filter</h3>
                    <p class="text-gray-300">Filter proposal berdasarkan kategori, bidang, tanggal acara, dan target dana</p>
                </div>

                <div class="text-center p-8 glass-card rounded-xl card-hover border border-white/10">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-check text-emerald-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Admin Verification</h3>
                    <p class="text-gray-300">Setiap proposal diverifikasi oleh admin untuk menjaga kualitas dan keamanan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 glass-card rounded-xl card-hover border border-white/10">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bookmark text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Save & Organize</h3>
                    <p class="text-gray-300">Simpan proposal favorit dan kelola daftar minat sponsorship Anda</p>
                </div>

                <div class="text-center p-8 glass-card rounded-xl card-hover border border-white/10">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-pink-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Multi-Sponsor Deal</h3>
                    <p class="text-gray-300">Satu proposal dapat di-deal oleh banyak sponsor untuk kolaborasi maksimal</p>
                </div>

                <div class="text-center p-8 glass-card rounded-xl card-hover border border-white/10">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bell text-orange-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Real-time Notification</h3>
                    <p class="text-gray-300">Notifikasi email otomatis untuk setiap update status proposal dan deal</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How It Works Section -->
    <section class="py-20" id="carakerja">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Cara Kerja Rekandana</h2>
                <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                    Proses yang sederhana dan efektif untuk menghubungkan proposal dengan sponsor yang tepat
                </p>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- For Students -->
                <div class="space-y-8">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-cyan-400 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white">Untuk Mahasiswa</h3>
                    </div>

                    <!-- Step 1 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">1</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Daftar & Verifikasi Email</h4>
                            <p class="text-gray-300">Buat akun dengan upload KTM, lalu verifikasi email Anda</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">2</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Upload Proposal</h4>
                            <p class="text-gray-300">Upload proposal Anda, pilih kirim umum atau direct ke sponsor tertentu</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">3</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Menunggu Approval Admin</h4>
                            <p class="text-gray-300">Admin akan review dan approve proposal Anda, notifikasi dikirim via email</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">4</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Dihubungi Sponsor</h4>
                            <p class="text-gray-300">Sponsor yang tertarik akan memulai deal dan menghubungi Anda langsung</p>
                        </div>
                    </div>
                </div>

                <!-- For Companies -->
                <div class="space-y-8">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-building text-violet-400 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white">Untuk Perusahaan</h3>
                    </div>

                    <!-- Step 1 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">1</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Daftar & Verifikasi Email</h4>
                            <p class="text-gray-300">Registrasi sebagai sponsor dan verifikasi email perusahaan Anda</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">2</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Browse & Filter Proposal</h4>
                            <p class="text-gray-300">Lihat proposal umum atau cek proposal direct yang dikirim khusus ke Anda</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">3</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Simpan atau Mulai Deal</h4>
                            <p class="text-gray-300">Bookmark proposal menarik atau langsung mulai deal dengan mahasiswa</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-sm">4</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-2">Hubungi & Kolaborasi</h4>
                            <p class="text-gray-300">Akses kontak mahasiswa setelah deal dan mulai kemitraan strategis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white/5" id="faq">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Frequently Asked Questions</h2>
                <p class="text-lg md:text-xl text-gray-300">
                    Temukan jawaban untuk pertanyaan yang sering diajukan
                </p>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4" x-data="{ activeIndex: null }">
                <!-- FAQ 1 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 0 ? null : 0"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Apa itu platform Rekandana?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 0 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 0"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Platform Rekandana adalah platform digital yang mempertemukan mahasiswa atau organisasi kampus dengan badan usaha yang ingin memberikan dukungan sponsorship dalam bentuk barang, jasa, atau dana.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 1 ? null : 1"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Bagaimana cara mengajukan proposal?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 1 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 1"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Cukup buat akun, isi profil, unggah proposal sesuai format yang disediakan, lalu pilih apakah ingin mengajukannya secara publik (dilihat semua mitra) atau direct ke perusahaan tertentu.
                        </p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 2 ? null : 2"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Apakah pengajuan proposal harus membayar?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 2 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 2"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Tidak, pengajuan proposal dasar tidak dikenakan biaya. Namun, ada fitur premium untuk meningkatkan visibilitas proposal kamu kepada lebih banyak perusahaan.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 3 ? null : 3"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Apakah proposal saya aman dan tidak disalahgunakan?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 3 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 3"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Ya. Semua proposal hanya dapat dilihat oleh perusahaan mitra terverifikasi dan tidak dapat diunduh tanpa izin.
                        </p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 4 ? null : 4"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Apakah platform mengambil komisi dari transaksi sponsorship?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 4 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 4"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Tidak. Kami tidak mengambil komisi dari transaksi antara perusahaan dan pengaju. Platform kami hanya menyediakan ruang dan sistem penghubung.
                        </p>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 5 ? null : 5"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Bagaimana jika perusahaan tertarik dengan proposal saya?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 5 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 5"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Jika perusahaan tertarik, platform akan menampilkan kontak kamu kepada perusahaan tersebut. Perusahaan dapat langsung menghubungi kamu untuk pembahasan lebih lanjut.
                        </p>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 6 ? null : 6"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Apakah sponsorship harus dalam bentuk uang tunai?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 6 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 6"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Tidak harus. Perusahaan dapat memberikan dukungan dalam bentuk barang, jasa, atau fasilitas lain sesuai kebutuhan kegiatan.
                        </p>
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="glass-card rounded-xl overflow-hidden border border-white/10">
                    <button
                        @click="activeIndex = activeIndex === 7 ? null : 7"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/5 transition-colors"
                    >
                        <span class="text:md md:text-lg font-medium text-white">Siapa saja yang bisa mengajukan proposal?</span>
                        <svg
                            class="w-5 h-5 text-gray-400 transition-transform duration-200"
                            :class="{ 'rotate-180': activeIndex === 7 }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeIndex === 7"
                        x-collapse
                        class="px-6 pb-5"
                    >
                        <p class="mt-4 text-gray-300 leading-relaxed">
                            Seluruh mahasiswa aktif atau organisasi resmi kampus (seperti BEM, UKM, komunitas, atau panitia kegiatan kampus) yang memiliki kegiatan terencana dan proposal resmi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="rounded-3xl p-12 text-center">
                <div class="mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Siap Memulai <span class="text-gradient">Kolaborasi</span>?
                    </h2>
                    <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
                        Bergabunglah dengan ratusan mahasiswa dan perusahaan yang telah sukses berkolaborasi di Rekandana
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 btn-gradient text-white text-lg font-semibold rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-200">
                        <span>Daftar Sekarang</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>

                <div class="mt-8 flex items-center justify-center gap-8 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Gratis Mendaftar</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Aman & Terverifikasi</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Tanpa Komisi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>
</html>