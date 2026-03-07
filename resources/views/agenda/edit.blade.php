<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- No Agenda -->
                            <div>
                                <label for="no_agenda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No. Agenda</label>
                                <input type="text" name="no_agenda" id="no_agenda" value="{{ old('no_agenda', $agenda->no_agenda) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @error('no_agenda')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Agenda -->
                            <div>
                                <label for="nama_agenda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Agenda</label>
                                <input type="text" name="nama_agenda" id="nama_agenda" value="{{ old('nama_agenda', $agenda->nama_agenda) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @error('nama_agenda')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Agenda -->
                            <div>
                                <label for="tanggal_agenda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal & Waktu Agenda</label>
                                <input type="datetime-local" name="tanggal_agenda" id="tanggal_agenda" value="{{ old('tanggal_agenda', $agenda->tanggal_agenda?->format('Y-m-d\TH:i')) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @error('tanggal_agenda')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lokasi</label>
                                <select name="lokasi" id="lokasi" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Offline" {{ old('lokasi', $agenda->lokasi) == 'Offline' ? 'selected' : '' }}>Offline</option>
                                    <option value="Online" {{ old('lokasi', $agenda->lokasi) == 'Online' ? 'selected' : '' }}>Online</option>
                                </select>
                                @error('lokasi')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Detail Lokasi -->
                            <div>
                                <label for="detail_lokasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Detail Lokasi</label>
                                <input type="text" name="detail_lokasi" id="detail_lokasi" value="{{ old('detail_lokasi', $agenda->detail_lokasi) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @error('detail_lokasi')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Link -->
                            <div>
                                <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link (Opsional)</label>
                                <input type="url" name="link" id="link" value="{{ old('link', $agenda->link) }}" placeholder="https://..." class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('link')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi Agenda -->
                        <div>
                            <label for="deskripsi_agenda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Agenda</label>
                            <textarea name="deskripsi_agenda" id="deskripsi_agenda" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('deskripsi_agenda', $agenda->deskripsi_agenda) }}</textarea>
                            @error('deskripsi_agenda')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-3">
                            <a href="{{ route('agenda.index') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md text-sm transition-colors">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm transition-colors">Update Agenda</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
