<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8 md:py-10 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card neon-border overflow-hidden rounded-lg sm:rounded-xl">
                <div class="p-4 sm:p-6 md:p-8 text-gray-100">

                    @if(auth()->user()->role === 'mahasiswa')
                        <h3 class="text-lg sm:text-xl md:text-2xl font-medium">Selamat Datang, Pengaju Proposal!</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base leading-relaxed">Siap untuk mewujudkan idemu? Ajukan proposalmu sekarang dan temukan sponsor yang tepat!</p>
                        <a href="{{ route('mahasiswa.proposals.create') }}" class="inline-block mt-4 sm:mt-6 px-4 sm:px-6 py-2 sm:py-3 btn-gradient font-semibold rounded-lg shadow-md text-sm sm:text-base transition-transform hover:scale-105">
                            Ajukan Proposal Baru
                        </a>

                    @elseif(auth()->user()->role === 'sponsor')
                        <h3 class="text-lg sm:text-xl md:text-2xl font-medium">Selamat Datang, Sponsor!</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base leading-relaxed">Temukan proposal inovatif dari mahasiswa berbakat di seluruh Indonesia.</p>
                         <a href="{{ route('sponsor.proposals.index') }}" class="inline-block mt-4 sm:mt-6 px-4 sm:px-6 py-2 sm:py-3 btn-gradient font-semibold rounded-lg shadow-md text-sm sm:text-base transition-transform hover:scale-105">
                            Mulai Cari Proposal
                        </a>

                    @elseif(auth()->user()->role === 'admin')
                        <h3 class="text-lg sm:text-xl md:text-2xl font-medium">Selamat Datang, Admin!</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base leading-relaxed">Ini adalah area administrasi. Kamu bisa mengelola proposal yang masuk dari sini.</p>
                         <a href="{{ route('admin.proposals.index') }}" class="inline-block mt-4 sm:mt-6 px-4 sm:px-6 py-2 sm:py-3 btn-gradient font-semibold rounded-lg shadow-md text-sm sm:text-base transition-transform hover:scale-105">
                            Lihat Proposal Masuk
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
