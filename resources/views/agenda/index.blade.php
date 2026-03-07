<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Daftar Agenda Pimpinan</h3>
                        <a href="{{ route('agenda.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm transition-colors">Buat Agenda Baru</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No. Agenda</th>
                                    <th scope="col" class="px-6 py-3">Nama Agenda</th>
                                    <th scope="col" class="px-6 py-3">Lokasi</th>
                                    <th scope="col" class="px-6 py-3">Detail Lokasi</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Agenda</th>
                                    <th scope="col" class="px-6 py-3">Link</th>
                                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $agenda)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $agenda->no_agenda }}</td>
                                    <td class="px-6 py-4">{{ $agenda->nama_agenda }}</td>
                                    <td class="px-6 py-4">{{ $agenda->lokasi }}</td>
                                    <td class="px-6 py-4">{{ $agenda->detail_lokasi }}</td>
                                    <td class="px-6 py-4">
                                        {{ $agenda->tanggal_agenda?->format('j M Y G:i') ?? '-' }} WIB
                                    </td>
                                    <td class="px-6 py-4">{{ $agenda->link ?? '-' }}</td>
                                    <td class="px-6 py-4 flex justify-center gap-2">
                                        <a href="{{ route('agenda.show', $agenda->id) }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 rounded-md px-2 py-1 dark:text-blue-400 dark:hover:text-blue-300">Detail</a>
                                        <a href="{{ route('agenda.edit', $agenda->id) }}" class="text-yellow-600 hover:text-yellow-900 border border-yellow-600 rounded-md px-2 py-1 dark:text-yellow-400 dark:hover:text-yellow-300">Edit</a>
                                        <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus agenda ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border border-red-600 rounded-md px-2 py-1 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @if($agendas->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center">Belum ada agenda.</td>
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
