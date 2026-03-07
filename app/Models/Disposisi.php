<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable = [
        'no_agenda', 'tanggal_agenda', 'jenis_agenda', 'sifat',
        'nomor_surat', 'tanggal_surat', 'asal_surat', 'tujuan_surat', 'perihal',
        'lampiran', 'jumlah_lembar', 'klasifikasi', 'retensi', 'attachment',
        'diketahui', 'ditindaklanjuti', 'jadwalkan_hadir',
        'catatan', 'status_disposisi', 'tanggal_disposisi', 'created_by',
        'bukti_disposisi'
    ];

    protected $casts = [
        'tanggal_agenda' => 'date',
        'tanggal_surat' => 'date',
        'tanggal_disposisi' => 'date',
        'diketahui' => 'boolean',
        'ditindaklanjuti' => 'boolean',
        'jadwalkan_hadir' => 'boolean',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
