<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Disposisi: {{ $disposisi->no_agenda }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid items-start border-b dark:border-gray-700">
                    <div class="flex justify-between items-center mb-6 border-b dark:border-gray-700 pb-4">
                        <h3 class="text-2xl font-bold">Informasi Surat</h3>
                        <span class="text-sm text-gray-500">Dibuat oleh: {{ $disposisi->creator->name }} pada {{ $disposisi->created_at->format('d M Y H:i') }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-lg text-indigo-600 dark:text-indigo-400 border-b pb-2 mb-4 dark:border-gray-700">Identitas Surat</h4>
                            <dl class="space-y-3 text-sm">
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">No Agenda</dt><dd class="col-span-2">{{ $disposisi->no_agenda }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Tanggal Agenda</dt><dd class="col-span-2">{{ $disposisi->tanggal_agenda->format('d M Y') }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Jenis Agenda</dt><dd class="col-span-2">{{ $disposisi->jenis_agenda }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Sifat</dt><dd class="col-span-2">{{ $disposisi->sifat }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Nomor Surat</dt><dd class="col-span-2">{{ $disposisi->nomor_surat }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Tanggal Surat</dt><dd class="col-span-2">{{ $disposisi->tanggal_surat->format('d M Y') }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Asal Surat</dt><dd class="col-span-2">{{ $disposisi->asal_surat }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Tujuan Surat</dt><dd class="col-span-2">{{ $disposisi->tujuan_surat }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Perihal</dt><dd class="col-span-2">{{ $disposisi->perihal }}</dd></div>
                            </dl>
                        </div>
                        
                        <div>
                            <h4 class="font-semibold text-lg text-indigo-600 dark:text-indigo-400 border-b pb-2 mb-4 dark:border-gray-700">Detail & Distribusi</h4>
                            <dl class="space-y-3 text-sm">
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Lampiran</dt><dd class="col-span-2">{{ $disposisi->lampiran ?? '-' }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Jumlah Lembar</dt><dd class="col-span-2">{{ $disposisi->jumlah_lembar }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Klasifikasi</dt><dd class="col-span-2">{{ $disposisi->klasifikasi ?? '-' }}</dd></div>
                                <div class="grid grid-cols-3"><dt class="font-medium text-gray-500 dark:text-gray-400">Retensi</dt><dd class="col-span-2">{{ $disposisi->retensi ?? '-' }}</dd></div>
                            </dl>

                            <div class="mt-6 border-t dark:border-gray-700 pt-4">
                                <h5 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Lembar Disposisi Instruksi:</h5>
                                <ul class="list-none space-y-1 text-sm">
                                    <li class="flex items-center gap-2">
                                        <input type="checkbox" disabled {{ $disposisi->diketahui ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span>Diketahui</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <input type="checkbox" disabled {{ $disposisi->ditindaklanjuti ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span>Ditindaklanjuti</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <input type="checkbox" disabled {{ $disposisi->jadwalkan_hadir ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span>Jadwalkan Saya Hadir</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-6 border-t dark:border-gray-700 pt-4">
                                <h5 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Diteruskan Kepada (Tim):</h5>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach($disposisi->teams as $team)
                                        <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full dark:bg-indigo-900 dark:text-indigo-300">{{ $team->name }}</span>
                                    @endforeach
                                    @if($disposisi->teams->isEmpty())
                                        <span class="text-sm text-gray-500">Tidak ada tim yang ditugaskan</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t dark:border-gray-700 pt-6">
                        <h4 class="font-semibold text-lg text-gray-900 dark:text-gray-100 mb-2">Catatan Disposisi</h4>
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-md border dark:border-gray-700">
                            {{ $disposisi->catatan ?? 'Tidak ada catatan.' }}
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Tanggal Disposisi: {{ $disposisi->tanggal_disposisi ? $disposisi->tanggal_disposisi->format('d M Y') : '-' }}</p>
                    </div>

                    @if($disposisi->attachment)
                    <div class="mt-6 border-t dark:border-gray-700 pt-6">
                        <h4 class="font-semibold text-lg text-gray-900 dark:text-gray-100 mb-3">File Attachment</h4>
                        <a href="{{ Storage::url($disposisi->attachment) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Buka File Attachment
                        </a>
                    </div>
                    @endif

                    <div class="mt-8 flex justify-end gap-4">
                        <a href="javascript:history.back()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-sm transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
