<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agendas')->insert([
            [
                'no_agenda' => 'AGD-001',
                'nama_agenda' => 'Rapat Koordinasi Mingguan',
                'deskripsi_agenda' => 'Pembahasan progress proyek IT semester 1.',
                'tanggal_agenda' => now()->addDays(2)->setHour(10)->setMinute(0),
                'lokasi' => 'Offline',
                'detail_lokasi' => 'Ruang Meeting Lt. 2',
                'link' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_agenda' => 'AGD-002',
                'nama_agenda' => 'Webinar Laravel Modern',
                'deskripsi_agenda' => 'Tips dan trik menggunakan Laravel 11.',
                'tanggal_agenda' => now()->addDays(5)->setHour(14)->setMinute(0),
                'lokasi' => 'Online',
                'detail_lokasi' => 'Zoom Cloud Meetings',
                'link' => 'https://zoom.us/j/123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_agenda' => 'AGD-003',
                'nama_agenda' => 'Workshop UI/UX Design',
                'deskripsi_agenda' => 'Praktek langsung membuat desain mobile app.',
                'tanggal_agenda' => now()->addDays(7)->setHour(9)->setMinute(0),
                'lokasi' => 'Offline',
                'detail_lokasi' => 'Aula Serbaguna Gedung B',
                'link' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_agenda' => 'AGD-004',
                'nama_agenda' => 'Rapat Evaluasi Kinerja',
                'deskripsi_agenda' => 'Evaluasi kinerja tim semester berjalan.',
                'tanggal_agenda' => now()->addDays(10)->setHour(13)->setMinute(0),
                'lokasi' => 'Offline',
                'detail_lokasi' => 'Ruang Rapat Utama',
                'link' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_agenda' => 'AGD-005',
                'nama_agenda' => 'Pelatihan Digital Marketing',
                'deskripsi_agenda' => 'Pelatihan strategi pemasaran digital.',
                'tanggal_agenda' => now()->addDays(14)->setHour(10)->setMinute(30),
                'lokasi' => 'Online',
                'detail_lokasi' => 'Google Meet',
                'link' => 'https://meet.google.com/abc-defg-hij',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
