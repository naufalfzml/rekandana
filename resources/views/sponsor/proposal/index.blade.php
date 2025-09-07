<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cari Proposal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($proposals as $proposal)
                    <x-proposal-card :proposal="$proposal" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-600">Belum ada proposal yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $proposals->links() }}
            </div>
        </div>
    </div>
</x-app-layout>