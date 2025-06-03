<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'nama_rapat',
        'bidang_rapat',
        'tanggal_rapat',
        'pemimpin_rapat',
        'waktu_mulai',
        'waktu_selesai',
        'ruangan_rapat',
        'pengelola_rapat',
        'jumlah_peserta',
        'deskripsi_rapat'
    ];
}
