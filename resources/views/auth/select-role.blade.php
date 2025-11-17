<x-guest-layout>
    <div class="mb-4 sm:mb-6">
        <a href="/" class="text-xs sm:text-sm text-gray-300 hover:text-white">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <h2 class="text-center text-lg sm:text-xl md:text-2xl font-bold text-white mb-2">Daftar Akun</h2>
    <p class="text-center text-xs sm:text-sm md:text-base text-gray-300 mb-4 sm:mb-6">Pilih jenis akun yang ingin Anda buat.</p>

    <a href="{{ route('register.mahasiswa') }}" class="block w-full text-left p-4 sm:p-5 glass-card neon-border rounded-lg hover:scale-[1.01] mb-4 transition-transform">
        <h3 class="font-semibold text-base sm:text-lg text-center text-white">Penyelenggara Kegiatan</h3>
        <p class="text-xs sm:text-sm text-gray-300 text-center">(User)</p>
    </a>

    <a href="{{ route('register.sponsor') }}" class="block w-full text-left p-4 sm:p-5 glass-card neon-border rounded-lg hover:scale-[1.01] transition-transform">
        <h3 class="font-semibold text-base sm:text-lg text-center text-white">Pemberi Sponsor</h3>
        <p class="text-xs sm:text-sm text-gray-300 text-center">(Perusahaan)</p>
    </a>
</x-guest-layout>
