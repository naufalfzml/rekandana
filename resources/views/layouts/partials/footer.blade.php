<footer class="bg-slate-900/60 backdrop-blur border-t border-white/10 text-white py-8 sm:py-10 md:py-12 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10">
            <!-- Brand Section -->
            <div class="col-span-1 lg:col-span-1">
                <div class="flex items-center mb-3 sm:mb-4">
                    <img src="{{ asset('storage/logos/logo-rekandana-polos.png') }}" alt="Rekandana Logo" class="w-10 sm:w-10 md:w-12 drop-shadow">
                    <span class="ml-2 text-lg sm:text-lg md:text-xl font-semibold">Rekandana</span>
                </div>
                <p class="text-gray-400 text-sm sm:text-sm md:text-base leading-relaxed pr-0 lg:pr-4">
                    Platform terpercaya untuk menghubungkan proposal dengan sponsor terbaik di Indonesia.
                </p>
            </div>

            <!-- Links Grid - 3 columns on mobile -->
            <div class="col-span-1 lg:col-span-3 grid grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                <!-- Product Links -->
                <div>
                    <h4 class="font-semibold mb-2 sm:mb-3 md:mb-4 text-sm sm:text-base md:text-lg">Produk</h4>
                    <ul class="space-y-1.5 sm:space-y-2 text-gray-400 text-xs sm:text-sm md:text-base">
                        <li><a href="/#fitur" class="hover:text-white transition-colors">Fitur</a></li>
                        <li><a href="/#carakerja" class="hover:text-white transition-colors">Cara Kerja</a></li>
                        <li><a href="/#faq" class="hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="font-semibold mb-2 sm:mb-3 md:mb-4 text-sm sm:text-base md:text-lg">Perusahaan</h4>
                    <ul class="space-y-1.5 sm:space-y-2 text-gray-400 text-xs sm:text-sm md:text-base">
                        <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Karir</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                    </ul>
                </div>

                <!-- Support Links -->
                <div>
                    <h4 class="font-semibold mb-2 sm:mb-3 md:mb-4 text-sm sm:text-base md:text-lg">Dukungan</h4>
                    <ul class="space-y-1.5 sm:space-y-2 text-gray-400 text-xs sm:text-sm md:text-base">
                        <li><a href="#" class="hover:text-white transition-colors">Bantuan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Dokumentasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="border-t border-white/10 mt-6 sm:mt-8 md:mt-10 pt-4 sm:pt-6 md:pt-8 text-center">
            <p class="text-gray-400 text-xs sm:text-xs md:text-sm">&copy; {{ date('Y') }} Rekandana. All rights reserved.</p>
        </div>
    </div>
</footer>
