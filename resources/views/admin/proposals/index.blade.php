<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Moderasi Proposal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Proposal Menunggu Persetujuan</h3>

                    <!-- Menampilkan pesan sukses -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="space-y-4">
                        @forelse ($pendingProposals as $proposal)
                            <div class="border p-4 rounded-lg flex flex-col sm:flex-row justify-between sm:items-center">
                                <!-- Info Proposal -->
                                <div class="mb-4 sm:mb-0">
                                    <p class="font-bold text-lg">{{ $proposal->title }}</p>
                                    <p class="text-sm text-gray-600">Oleh: {{ $proposal->user->name }} ({{ $proposal->user->university }})</p>
                                    <a href="{{ asset('storage/' . $proposal->file_path) }}" target="_blank" class="text-sm text-indigo-600 hover:underline">
                                        Lihat Dokumen Proposal
                                    </a>
                                </div>
                                <!-- Tombol Aksi -->
                                <div class="flex gap-2 flex-shrink-0">
                                    <form action="{{ route('admin.proposals.approve', $proposal) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-3 py-2 bg-green-500 text-white text-sm font-semibold rounded hover:bg-green-600 w-full sm:w-auto">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.proposals.reject', $proposal) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-3 py-2 bg-red-500 text-white text-sm font-semibold rounded hover:bg-red-600 w-full sm:w-auto">Reject</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Tidak ada proposal yang menunggu persetujuan saat ini.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>