<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Disposisi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('disposisi.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Left Column: Identitas -->
                            <div>
                                <h3 class="text-lg font-medium text-indigo-600 dark:text-indigo-400 mb-4 border-b pb-2">Identitas Surat</h3>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <x-input-label for="no_agenda" value="No Agenda *" />
                                        <x-text-input id="no_agenda" class="block mt-1 w-full" type="text" name="no_agenda" :value="old('no_agenda')" required autofocus />
                                        <x-input-error :messages="$errors->get('no_agenda')" class="mt-2" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="tanggal_agenda" value="Tanggal Agenda *" />
                                        <x-text-input id="tanggal_agenda" class="block mt-1 w-full" type="date" name="tanggal_agenda" :value="old('tanggal_agenda')" required />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div class="col-span-1">
                                        <x-input-label for="jenis_agenda" value="Jenis Agenda *" />
                                        <x-text-input id="jenis_agenda" class="block mt-1 w-full" type="text" name="jenis_agenda" :value="old('jenis_agenda')" required />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="sifat" value="Sifat *" />
                                        <x-text-input id="sifat" class="block mt-1 w-full" type="text" name="sifat" :value="old('sifat')" required />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div class="col-span-1">
                                        <x-input-label for="nomor_surat" value="Nomor Surat *" />
                                        <x-text-input id="nomor_surat" class="block mt-1 w-full" type="text" name="nomor_surat" :value="old('nomor_surat')" required />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="tanggal_surat" value="Tanggal Surat *" />
                                        <x-text-input id="tanggal_surat" class="block mt-1 w-full" type="date" name="tanggal_surat" :value="old('tanggal_surat')" required />
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="asal_surat" value="Asal Surat *" />
                                    <x-text-input id="asal_surat" class="block mt-1 w-full" type="text" name="asal_surat" :value="old('asal_surat')" required />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="tujuan_surat" value="Tujuan Surat *" />
                                    <x-text-input id="tujuan_surat" class="block mt-1 w-full" type="text" name="tujuan_surat" :value="old('tujuan_surat')" required />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="perihal" value="Perihal *" />
                                    <textarea id="perihal" name="perihal" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm" required>{{ old('perihal') }}</textarea>
                                </div>
                            </div>

                            <!-- Right Column: Detail, Log, and Distribusi -->
                            <div>
                                <h3 class="text-lg font-medium text-indigo-600 dark:text-indigo-400 mb-4 border-b pb-2">Detail & Distribusi</h3>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <x-input-label for="jumlah_lembar" value="Jumlah Lembar *" />
                                        <x-text-input id="jumlah_lembar" class="block mt-1 w-full" type="number" name="jumlah_lembar" :value="old('jumlah_lembar', 1)" required min="1" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="lampiran" value="Keterangan Lampiran" />
                                        <x-text-input id="lampiran" class="block mt-1 w-full" type="text" name="lampiran" :value="old('lampiran')" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div class="col-span-1">
                                        <x-input-label for="klasifikasi" value="Klasifikasi" />
                                        <x-text-input id="klasifikasi" class="block mt-1 w-full" type="text" name="klasifikasi" :value="old('klasifikasi')" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label for="retensi" value="Retensi" />
                                        <x-text-input id="retensi" class="block mt-1 w-full" type="text" name="retensi" :value="old('retensi')" />
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="attachment" value="File Attachment (PDF, JPG, PNG - Max 5MB)" />
                                    <input type="file" id="attachment" name="attachment" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                </div>

                                <h4 class="mt-6 mb-2 font-medium text-gray-900 dark:text-gray-100">Lembar Instruksi Pimpinan</h4>
                                <div class="space-y-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="diketahui" value="1" {{ old('diketahui') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Diketahui</span>
                                    </label>
                                    <br>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="ditindaklanjuti" value="1" {{ old('ditindaklanjuti') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Ditindaklanjuti</span>
                                    </label>
                                    <br>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="jadwalkan_hadir" value="1" {{ old('jadwalkan_hadir') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Jadwalkan Saya Hadir</span>
                                    </label>
                                </div>

                                <div class="mt-6">
                                    <x-input-label value="Diteruskan Kepada (Pilih Tim) *" />
                                    <div class="mt-2 grid grid-cols-2 gap-2 bg-gray-50 dark:bg-gray-900 p-4 rounded-md border dark:border-gray-700">
                                        @foreach($teams as $team)
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="teams[]" value="{{ $team->id }}" {{ (is_array(old('teams')) && in_array($team->id, old('teams'))) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $team->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <x-input-error :messages="$errors->get('teams')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="catatan" value="Catatan Disposisi" />
                                    <textarea id="catatan" name="catatan" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm">{{ old('catatan') }}</textarea>
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="tanggal_disposisi" value="Tanggal Disposisi" />
                                    <x-text-input id="tanggal_disposisi" class="block mt-1 w-full md:w-1/2" type="date" name="tanggal_disposisi" :value="old('tanggal_disposisi')" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 gap-4 border-t dark:border-gray-700 pt-6">
                            <a href="{{ route('disposisi.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Batal</a>
                            <x-primary-button>
                                {{ __('Simpan Disposisi') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
