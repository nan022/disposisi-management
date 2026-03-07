<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}! 👋🏻</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Anda login sebagai <span class="uppercase font-semibold text-indigo-600 dark:text-indigo-400">{{ auth()->user()->role }}</span>.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg w-full">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300 mr-4 flex-shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Disposisi</p>
                                <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['total_disposisi'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->isAdmin())
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 mr-4 flex-shrink-0">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total User</p>
                                    <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['total_users'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300 mr-4 flex-shrink-0">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Tim</p>
                                    <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['total_teams'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if(auth()->user()->isPimpinan())
                <div class="mt-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Agenda Terdekat</h3>
                            @if($upcomingAgendas->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($upcomingAgendas as $agenda)
                                        <div class="p-4 bg-indigo-50 dark:bg-gray-900 rounded-lg border border-indigo-100 dark:border-indigo-800">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $agenda->nama_agenda }}</h4>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $agenda->no_agenda }}</p>
                                                </div>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $agenda->lokasi == 'Online' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' }}">
                                                    {{ $agenda->lokasi }}
                                                </span>
                                            </div>
                                            <div class="mt-3 flex items-center text-sm text-gray-600 dark:text-gray-400">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ $agenda->tanggal_agenda->format('j M Y') }}
                                                <span class="mx-2">|</span>
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $agenda->tanggal_agenda->format('H:i') }} WIB
                                            </div>
                                            <div class="mt-2 flex items-center text-sm text-gray-600 dark:text-gray-400">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $agenda->detail_lokasi }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400 text-center py-4">Tidak ada agenda terdekat.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Grafik Disposisi per Tim</h3>
                                <div class="relative h-64">
                                    <canvas id="disposisiChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Daftar Tim</h3>
                                <div class="space-y-3">
                                    @forelse($teamDisposisiCounts as $item)
                                        <a href="{{ route('monitor.disposisi.team', $item['id']) }}" class="block p-4 bg-gray-50 dark:bg-gray-700 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 rounded-lg transition-colors">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $item['name'] }}</p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Klik untuk melihat disposisi</p>
                                                </div>
                                                <div class="text-right">
                                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full text-indigo-600 dark:text-indigo-300 font-semibold">
                                                        {{ $item['count'] }}
                                                    </span>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">disposisi</p>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                        <p class="text-gray-500 dark:text-gray-400 text-center py-4">Belum ada tim.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('disposisiChart').getContext('2d');
                            const teamNames = @json(array_column($teamDisposisiCounts, 'name'));
                            const teamCounts = @json(array_column($teamDisposisiCounts, 'count'));
                            const isDark = document.documentElement.classList.contains('dark');
                            const textColor = isDark ? '#9ca3af' : '#4b5563';
                            const gridColor = isDark ? '#374151' : '#e5e7eb';

                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: teamNames,
                                    datasets: [{
                                        label: 'Jumlah Disposisi',
                                        data: teamCounts,
                                        backgroundColor: 'rgba(79, 70, 229, 0.8)',
                                        borderColor: 'rgba(79, 70, 229, 1)',
                                        borderWidth: 1,
                                        borderRadius: 6,
                                        barThickness: 40,
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: { legend: { display: false } },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: { stepSize: 1, color: textColor },
                                            grid: { color: gridColor }
                                        },
                                        x: {
                                            ticks: { color: textColor },
                                            grid: { display: false }
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>