<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama_pegawai',
        'nip',
        'jabatan_pegawai',
        'bidang_pegawai',
        'no_telp_pegawai',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
