    <!-- Header/Navigation -->
    <nav x-data="{ mobileMenuOpen: false }" class="bg-slate-900/40 backdrop-blur border-b border-white/10 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <img src="{{ asset('storage/logos/logo-rekandana-polos.png') }}" alt="Rekandana" class="w-12 sm:w-16 drop-shadow">
                        <span class="ml-2 text-xl md:text-2xl font-semibold text-gray-100">Rekandana</span>
                    </a>
                </div>

                <!-- Navigation Menu - Desktop -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#fitur" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Fitur</a>
                        <a href="#carakerja" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Cara Kerja</a>
                        <a href="#faq" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">FAQ</a>
                    </div>
                </div>

                <!-- Right side buttons - Desktop -->
                <div class="hidden sm:flex items-center space-x-3 sm:space-x-4">
                    <a href="/login" class="text-gray-300 hover:text-white px-2 py-2 sm:px-3 sm:py-2 text-xs sm:text-sm font-medium">
                        Masuk
                    </a>
                    <a href="/register" class="btn-gradient px-3 py-2 sm:px-4 sm:py-2 rounded-lg text-xs sm:text-sm font-medium transition-transform hover:scale-[1.02] whitespace-nowrap">
                        Daftar Gratis
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-white/10 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" class="hidden sm:hidden border-t border-white/10">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#fitur" class="text-gray-300 hover:text-white block px-3 py-2 text-sm font-medium">Fitur</a>
                <a href="#carakerja" class="text-gray-300 hover:text-white block px-3 py-2 text-sm font-medium">Cara Kerja</a>
                <a href="#faq" class="text-gray-300 hover:text-white block px-3 py-2 text-sm font-medium">FAQ</a>
                <div class="border-t border-white/10 pt-3 mt-3 space-y-2">
                    <a href="/login" class="text-gray-300 hover:text-white block px-3 py-2 text-sm font-medium">
                        Masuk
                    </a>
                    <a href="/register" class="btn-gradient block text-center px-3 py-2 rounded-lg text-sm font-medium">
                        Daftar Gratis
                    </a>
                </div>
            </div>
        </div>
    </nav>
