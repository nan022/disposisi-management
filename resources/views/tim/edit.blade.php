<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Disposisi: {{ $disposisi->no_agenda }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('tim.disposisi.update', $disposisi->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Left Column: Identitas (Readonly) -->
                            <div>
                                <h3 class="text-lg font-medium text-indigo-600 dark:text-indigo-400 mb-4 border-b pb-2">Identitas Surat</h3>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <x-input-label for="no_agenda" value="No Agenda *" />
                                        <x-text-input id="no_agenda" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="no_agenda" :value="old('no_agenda', $disposisi->no_agenda)" readonly />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="tanggal_agenda" value="Tanggal Agenda *" />
                                        <x-text-input id="tanggal_agenda" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="date" name="tanggal_agenda" :value="old('tanggal_agenda', $disposisi->tanggal_agenda->format('Y-m-d'))" readonly />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div class="col-span-1">
                                        <x-input-label for="jenis_agenda" value="Jenis Agenda *" />
                                        <x-text-input id="jenis_agenda" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="jenis_agenda" :value="old('jenis_agenda', $disposisi->jenis_agenda)" readonly />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="sifat" value="Sifat *" />
                                        <x-text-input id="sifat" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="sifat" :value="old('sifat', $disposisi->sifat)" readonly />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div class="col-span-1">
                                        <x-input-label for="nomor_surat" value="Nomor Surat *" />
                                        <x-text-input id="nomor_surat" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="nomor_surat" :value="old('nomor_surat', $disposisi->nomor_surat)" readonly />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="tanggal_surat" value="Tanggal Surat *" />
                                        <x-text-input id="tanggal_surat" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="date" name="tanggal_surat" :value="old('tanggal_surat', $disposisi->tanggal_surat->format('Y-m-d'))" readonly />
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="asal_surat" value="Asal Surat *" />
                                    <x-text-input id="asal_surat" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="asal_surat" :value="old('asal_surat', $disposisi->asal_surat)" readonly />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="tujuan_surat" value="Tujuan Surat *" />
                                    <x-text-input id="tujuan_surat" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="tujuan_surat" :value="old('tujuan_surat', $disposisi->tujuan_surat)" readonly />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="perihal" value="Perihal *" />
                                    <textarea id="perihal" name="perihal" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm bg-gray-100 cursor-not-allowed" readonly>{{ old('perihal', $disposisi->perihal) }}</textarea>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="status_disposisi" value="Status Disposisi *" />
                                    
                                    <select id="status_disposisi" name="status_disposisi" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="0" {{ old('status_disposisi', $disposisi->status_disposisi) == 0 ? 'selected' : '' }}>Belum</option>
                                        <option value="1" {{ old('status_disposisi', $disposisi->status_disposisi) == 1 ? 'selected' : '' }}>Sudah</option>
                                    </select>

                                    <x-input-error :messages="$errors->get('status_disposisi')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Right Column: Detail, Log, and Distribusi -->
                            <div>
                                <h3 class="text-lg font-medium text-indigo-600 dark:text-indigo-400 mb-4 border-b pb-2">Detail & Distribusi</h3>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <x-input-label for="jumlah_lembar" value="Jumlah Lembar *" />
                                        <x-text-input id="jumlah_lembar" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="number" name="jumlah_lembar" :value="old('jumlah_lembar', $disposisi->jumlah_lembar)" readonly min="1" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="lampiran" value="Keterangan Lampiran" />
                                        <x-text-input id="lampiran" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="lampiran" :value="old('lampiran', $disposisi->lampiran)" readonly />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div class="col-span-1">
                                        <x-input-label for="klasifikasi" value="Klasifikasi" />
                                        <x-text-input id="klasifikasi" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="klasifikasi" :value="old('klasifikasi', $disposisi->klasifikasi)" readonly />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="retensi" value="Retensi" />
                                        <x-text-input id="retensi" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="text" name="retensi" :value="old('retensi', $disposisi->retensi)" readonly />
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <x-input-label value="File Attachment" />
                                    @if($disposisi->attachment)
                                        <p class="text-sm text-gray-500 my-1">File saat ini: <a href="{{ Storage::url($disposisi->attachment) }}" target="_blank" class="text-indigo-600 underline">Lihat File</a></p>
                                    @endif
                                    <input type="file" id="attachment" name="attachment" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-not-allowed bg-gray-100 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" disabled>
                                    <p class="text-xs text-gray-500 mt-1">File tidak dapat diubah di halaman ini.</p>
                                </div>

                                <h4 class="mt-6 mb-2 font-medium text-gray-900 dark:text-gray-100">Lembar Instruksi Pimpinan</h4>
                                <div class="space-y-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="diketahui" value="1" {{ old('diketahui', $disposisi->diketahui) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Diketahui</span>
                                    </label>
                                    <br>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="ditindaklanjuti" value="1" {{ old('ditindaklanjuti', $disposisi->ditindaklanjuti) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Ditindaklanjuti</span>
                                    </label>
                                    <br>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="jadwalkan_hadir" value="1" {{ old('jadwalkan_hadir', $disposisi->jadwalkan_hadir) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Jadwalkan Saya Hadir</span>
                                    </label>
                                </div>

                                <div class="mt-6">
                                    <x-input-label value="Diteruskan Kepada (Pilih Tim) *" />
                                    <div class="mt-2 grid grid-cols-2 gap-2 bg-gray-50 dark:bg-gray-900 p-4 rounded-md border dark:border-gray-700 opacity-75">
                                        @foreach($teams as $team)
                                            @php
                                                $isChecked = is_array(old('teams', $disposisi->teams->pluck('id')->toArray())) && in_array($team->id, old('teams', $disposisi->teams->pluck('id')->toArray()));
                                            @endphp
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="teams[]" value="{{ $team->id }}" {{ $isChecked ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" disabled>
                                                @if($isChecked)
                                                    <input type="hidden" name="teams[]" value="{{ $team->id }}">
                                                @endif
                                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $team->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Distribusi tim terkunci.</p>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="catatan" value="Catatan Disposisi" />
                                    <textarea id="catatan" name="catatan" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm bg-gray-100 cursor-not-allowed" readonly>{{ old('catatan', $disposisi->catatan) }}</textarea>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="tanggal_disposisi" value="Tanggal Disposisi" />
                                    <x-text-input id="tanggal_disposisi" class="block mt-1 w-full md:w-1/2 bg-gray-100 dark:bg-gray-700 cursor-not-allowed" type="date" name="tanggal_disposisi" :value="old('tanggal_disposisi', $disposisi->tanggal_disposisi ? $disposisi->tanggal_disposisi->format('Y-m-d') : '')" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 gap-4 border-t dark:border-gray-700 pt-6">
                            <a href="{{ route('tim.disposisi') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Batal</a>
                            <x-primary-button>
                                {{ __('Perbarui Data') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>