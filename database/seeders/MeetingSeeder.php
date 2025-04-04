<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Meeting;
use Carbon\Carbon;

class MeetingSeeder extends Seeder
{
    public function run()
    {
        Meeting::create([
            'nama_rapat' => 'Evaluasi Bulanan',
            'bidang' => 'IT',
            'tanggal' => Carbon::now()->toDateString(),
            'pemimpin' => 'Budi Santoso',
            'waktu_mulai' => '10:00:00',
            'waktu_selesai' => '12:00:00',
            'ruangan' => 'Ruang Rapat 1',
            'pengelola' => 'Admin IT'
        ]);
    }
}

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class MeetingSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         //
//     }
// }
