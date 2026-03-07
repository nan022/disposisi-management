<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monitor Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Daftar Agenda Pimpinan</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No. Agenda</th>
                                    <th scope="col" class="px-6 py-3">Nama Agenda</th>
                                    <th scope="col" class="px-6 py-3">Lokasi</th>
                                    <th scope="col" class="px-6 py-3">Detail Lokasi</th>
                                    <th scope="col" class="px-6 py-3">Tanggal & Waktu</th>
                                    <th scope="col" class="px-6 py-3">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $agenda)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $agenda->no_agenda }}</td>
                                    <td class="px-6 py-4">{{ $agenda->nama_agenda }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $agenda->lokasi == 'Online' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' }}">
                                            {{ $agenda->lokasi }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ $agenda->detail_lokasi }}</td>
                                    <td class="px-6 py-4">{{ $agenda->tanggal_agenda->format('j M Y G:i') }} WIB</td>
                                    <td class="px-6 py-4">
                                        @if($agenda->link)
                                            <a href="{{ $agenda->link }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 underline">
                                                Buka Link
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @if($agendas->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center">Belum ada agenda.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $agendas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
