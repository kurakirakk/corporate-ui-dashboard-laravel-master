<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = new \App\Models\User();
        $user->name = 'Intan';
        $user->nik = '12345678901';
        $user->password = bcrypt('pw123');
        $user->save();
        // User::factory()->create([
        //     'name' => 'Alec Thompson',
        //     'email' => 'admin@corporateui.com',
        //     'password' => Hash::make('secret'),
        //     'about' => "Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).",
        //]);
    }
}

