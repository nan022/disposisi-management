<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_agenda',
        'nama_agenda',
        'deskripsi_agenda',
        'tanggal_agenda',
        'lokasi',
        'detail_lokasi',
        'link',
    ];

    protected $casts = [
        'tanggal_agenda' => 'datetime', // Pastikan ada 's' di $casts
    ];
}
