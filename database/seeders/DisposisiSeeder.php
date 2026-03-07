<?php

namespace Database\Seeders;

use App\Models\Disposisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disposisi untuk Tim IT
        Disposisi::create([
            'no_agenda' => 'DIS-001',
            'tanggal_agenda' => now()->addDays(3),
            'jenis_agenda' => 'Surat Biasa',
            'sifat' => 'Penting',
            'nomor_surat' => 'IT/001/2026',
            'tanggal_surat' => now()->subDays(2),
            'asal_surat' => 'PT Teknologi Maju',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Permintaan pengembangan sistem informasi',
            'lampiran' => 'Proposal Pengembangan SI',
            'jumlah_lembar' => 5,
            'klasifikasi' => 'Rahasia',
            'retensi' => '5 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => true,
            'jadwalkan_hadir' => false,
            'catatan' => 'Segera diproses dan koordinasi dengan tim IT',
            'status_disposisi' => 1,
            'tanggal_disposisi' => now(),
            'created_by' => 2, // Sekretaris
        ])->teams()->attach([1]); // Tim IT

        Disposisi::create([
            'no_agenda' => 'DIS-002',
            'tanggal_agenda' => now()->addDays(5),
            'jenis_agenda' => 'Surat Undangan',
            'sifat' => 'Segera',
            'nomor_surat' => 'IT/002/2026',
            'tanggal_surat' => now()->subDays(1),
            'asal_surat' => 'Kementrian Kominfo',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Undangan seminar teknologi digital',
            'lampiran' => 'Undangan Seminar',
            'jumlah_lembar' => 2,
            'klasifikasi' => 'Biasa',
            'retensi' => '1 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => true,
            'jadwalkan_hadir' => true,
            'catatan' => 'Kirimsurat koordinasi dengan tim IT',
            'status_disposisi' => 0,
            'tanggal_disposisi' => now(),
            'created_by' => 2,
        ])->teams()->attach([1]); // Tim IT

        // Disposisi untuk Tim Keuangan
        Disposisi::create([
            'no_agenda' => 'DIS-003',
            'tanggal_agenda' => now()->addDays(4),
            'jenis_agenda' => 'Surat Keuangan',
            'sifat' => 'Sangat Segera',
            'nomor_surat' => 'KEU/001/2026',
            'tanggal_surat' => now()->subDays(3),
            'asal_surat' => 'Bank Central Asia',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Permintaan verifikasi rekening korporat',
            'lampiran' => 'Dokumen Rekening',
            'jumlah_lembar' => 8,
            'klasifikasi' => 'Rahasia',
            'retensi' => '10 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => true,
            'jadwalkan_hadir' => false,
            'catatan' => 'Segera proses dan koordinasikan dengan tim Keuangan',
            'status_disposisi' => 1,
            'tanggal_disposisi' => now(),
            'created_by' => 2,
        ])->teams()->attach([2]); // Tim Keuangan

        Disposisi::create([
            'no_agenda' => 'DIS-004',
            'tanggal_agenda' => now()->addDays(7),
            'jenis_agenda' => 'Surat Biasa',
            'sifat' => 'Biasa',
            'nomor_surat' => 'KEU/002/2026',
            'tanggal_surat' => now()->subDays(5),
            'asal_surat' => 'PT Jaya Abadi',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Permintaan pembayaran tagihan',
            'lampiran' => 'Invoice',
            'jumlah_lembar' => 3,
            'klasifikasi' => 'Biasa',
            'retensi' => '3 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => false,
            'jadwalkan_hadir' => false,
            'catatan' => 'Menunggu verifikasi anggaran',
            'status_disposisi' => 0,
            'tanggal_disposisi' => null,
            'created_by' => 2,
        ])->teams()->attach([2]); // Tim Keuangan

        // Disposisi untuk Tim SDM
        Disposisi::create([
            'no_agenda' => 'DIS-005',
            'tanggal_agenda' => now()->addDays(6),
            'jenis_agenda' => 'Surat Undangan',
            'sifat' => 'Penting',
            'nomor_surat' => 'SDM/001/2026',
            'tanggal_surat' => now()->subDays(2),
            'asal_surat' => 'Universitas Indonesia',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Kerja sama magang mahasiswa',
            'lampiran' => 'Proposal MoU',
            'jumlah_lembar' => 10,
            'klasifikasi' => 'Biasa',
            'retensi' => '5 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => true,
            'jadwalkan_hadir' => false,
            'catatan' => 'Koordinasikan dengan tim SDM untuk review proposal',
            'status_disposisi' => 1,
            'tanggal_disposisi' => now(),
            'created_by' => 2,
        ])->teams()->attach([3]); // Tim SDM

        // Disposisi untuk multiple tim (Tim IT + Tim Keuangan)
        Disposisi::create([
            'no_agenda' => 'DIS-006',
            'tanggal_agenda' => now()->addDays(8),
            'jenis_agenda' => 'Surat Biasa',
            'sifat' => 'Penting',
            'nomor_surat' => 'IT/003/2026',
            'tanggal_surat' => now()->subDays(1),
            'asal_surat' => 'PT Sumber Rejeki',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Implementasi ERP dan integrasi keuangan',
            'lampiran' => 'Spesifikasi Teknis',
            'jumlah_lembar' => 15,
            'klasifikasi' => 'Rahasia',
            'retensi' => '7 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => true,
            'jadwalkan_hadir' => false,
            'catatan' => 'Butuh koordinasi antara tim IT dan Keuangan',
            'status_disposisi' => 0,
            'tanggal_disposisi' => now(),
            'created_by' => 2,
        ])->teams()->attach([1, 2]); // Tim IT + Tim Keuangan

        // Disposisi untuk Tim Hukum
        Disposisi::create([
            'no_agenda' => 'DIS-007',
            'tanggal_agenda' => now()->addDays(10),
            'jenis_agenda' => 'Surat Legal',
            'sifat' => 'Sangat Segera',
            'nomor_surat' => 'HKM/001/2026',
            'tanggal_surat' => now()->subDays(4),
            'asal_surat' => 'Kantor Hukum Justice',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Review kontrak kerjasama baru',
            'lampiran' => 'Draft Kontrak',
            'jumlah_lembar' => 25,
            'klasifikasi' => 'Sangat Rahasia',
            'retensi' => '10 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => true,
            'jadwalkan_hadir' => true,
            'catatan' => 'Segera review karena deadline ketat',
            'status_disposisi' => 1,
            'tanggal_disposisi' => now(),
            'created_by' => 2,
        ])->teams()->attach([4]); // Tim Hukum

        // Disposisi untuk Tim Umum
        Disposisi::create([
            'no_agenda' => 'DIS-008',
            'tanggal_agenda' => now()->addDays(12),
            'jenis_agenda' => 'Surat Undangan',
            'sifat' => 'Biasa',
            'nomor_surat' => 'UMS/001/2026',
            'tanggal_surat' => now()->subDays(3),
            'asal_surat' => 'Dinas Perumahan',
            'tujuan_surat' => 'Pimpinan',
            'perihal' => 'Undangan gathering tahunan',
            'lampiran' => 'Tata Tertib',
            'jumlah_lembar' => 1,
            'klasifikasi' => 'Biasa',
            'retensi' => '1 Tahun',
            'diketahui' => true,
            'ditindaklanjuti' => false,
            'jadwalkan_hadir' => false,
            'catatan' => '',
            'status_disposisi' => 0,
            'tanggal_disposisi' => null,
            'created_by' => 2,
        ])->teams()->attach([5]); // Tim Umum
    }
}
