<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Disposisi Tim: ') . $team->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-medium">Daftar Disposisi untuk Tim {{ $team->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total: {{ $disposisis->total() }} disposisi</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md text-sm transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Kembali ke Dashboard</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No. Agenda</th>
                                    <th scope="col" class="px-6 py-3">Asal Surat</th>
                                    <th scope="col" class="px-6 py-3">Perihal</th>
                                    <th scope="col" class="px-6 py-3">Diteruskan Ke</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Agenda</th>
                                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($disposisis as $disposisi)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $disposisi->no_agenda }}</td>
                                    <td class="px-6 py-4">{{ $disposisi->asal_surat }}</td>
                                    <td class="px-6 py-4">{{ Str::limit($disposisi->perihal, 30) }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($disposisi->teams as $t)
                                                <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $t->name }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">{{ $disposisi->tanggal_agenda->format('j M Y G:i') }} WIB</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($disposisi->status_disposisi == 1)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                Selesai
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300">
                                                Belum
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @if($disposisis->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center">Belum ada disposisi untuk tim ini.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $disposisis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
