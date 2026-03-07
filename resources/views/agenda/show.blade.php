<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Agenda: {{ $agenda->nama_agenda }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6 border-b dark:border-gray-700 pb-4">
                        <h3 class="text-2xl font-bold">Informasi Agenda</h3>
                        <span class="text-sm text-gray-500">Dibuat pada {{ $agenda->created_at->format('d M Y H:i') }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-lg text-indigo-600 dark:text-indigo-400 border-b pb-2 mb-4 dark:border-gray-700">Detail Agenda</h4>
                            <dl class="space-y-3 text-sm">
                                <div class="grid grid-cols-3">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">No. Agenda</dt>
                                    <dd class="col-span-2">{{ $agenda->no_agenda }}</dd>
                                </div>
                                <div class="grid grid-cols-3">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Nama Agenda</dt>
                                    <dd class="col-span-2">{{ $agenda->nama_agenda }}</dd>
                                </div>
                                <div class="grid grid-cols-3">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Tanggal & Waktu</dt>
                                    <dd class="col-span-2">{{ $agenda->tanggal_agenda->format('d M Y H:i') }} WIB</dd>
                                </div>
                                <div class="grid grid-cols-3">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Lokasi</dt>
                                    <dd class="col-span-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $agenda->lokasi == 'Online' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' }}">
                                            {{ $agenda->lokasi }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-3">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Detail Lokasi</dt>
                                    <dd class="col-span-2">{{ $agenda->detail_lokasi }}</dd>
                                </div>
                                @if($agenda->link)
                                <div class="grid grid-cols-3">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Link</dt>
                                    <dd class="col-span-2">
                                        <a href="{{ $agenda->link }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 underline">
                                            {{ $agenda->link }}
                                        </a>
                                    </dd>
                                </div>
                                @endif
                            </dl>
                        </div>

                        <div>
                            <h4 class="font-semibold text-lg text-indigo-600 dark:text-indigo-400 border-b pb-2 mb-4 dark:border-gray-700">Deskripsi</h4>
                            <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-md border dark:border-gray-700 text-sm">
                                {{ $agenda->deskripsi_agenda }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center">
                        <a href="javascript:history.back()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-sm transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Kembali</a>
                        <div class="flex gap-2">
                            <a href="{{ route('agenda.edit', $agenda->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-sm transition-colors">Edit Agenda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
