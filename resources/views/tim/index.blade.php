<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Disposisi Masuk - Tim ' . auth()->user()->team->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Daftar Pekerjaan Tim</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No. Surat</th>
                                    <th scope="col" class="px-6 py-3">Asal Surat</th>
                                    <th scope="col" class="px-6 py-3">Perihal</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Agenda</th>
                                    <th scope="col" class="px-6 py-3 text-center">Instruksi Pimpinan</th>
                                    <th scope="col" class="px-6 py-3 text-center">Status Disposisi</th>
                                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($disposisis as $disposisi)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $disposisi->nomor_surat }}</td>
                                    <td class="px-6 py-4">{{ $disposisi->asal_surat }}</td>
                                    <td class="px-6 py-4">{{ Str::limit($disposisi->perihal, 40) }}</td>
                                    <td class="px-6 py-4">{{ $disposisi->tanggal_agenda->format('j M Y G:i') }} WIB</td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col gap-1 items-center">
                                            @if($disposisi->diketahui)
                                                <span class="inline-flex items-center text-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                    Diketahui
                                                </span>
                                            @endif

                                            @if($disposisi->ditindaklanjuti)
                                                <span class="inline-flex items-center text-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    Ditindaklanjuti
                                                </span>
                                            @endif

                                            @if($disposisi->jadwalkan_hadir)
                                                <span class="inline-flex items-center text-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                    Jadwalkan Hadir
                                                </span>
                                            @endif

                                            @if(!$disposisi->diketahui && !$disposisi->ditindaklanjuti && !$disposisi->jadwalkan_hadir)
                                                <span class="text-xs text-gray-400 italic">Belum ada status</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col gap-1 items-center">
                                        @if($disposisi->status_disposisi == 0)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300">
                                                    Belum
                                                </span>
                                            @endif
                                            @if($disposisi->status_disposisi == 1)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    Sudah
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 flex justify-center gap-2">
                                        <a href="{{ route('tim.disposisi.show', $disposisi->id) }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 rounded-md px-2 py-1 dark:text-blue-400 dark:hover:text-blue-300">Detail</a>
                                        <a href="{{ route('tim.disposisi.edit', $disposisi->id) }}" class="text-yellow-600 hover:text-yellow-900 border border-yellow-600 rounded-md px-2 py-1 dark:text-yellow-400 dark:hover:text-yellow-300">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                @if($disposisis->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center">Belum ada disposisi untuk tim ini.</td>
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
