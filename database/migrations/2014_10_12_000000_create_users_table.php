<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('name')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};

// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('users', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->string('email')->unique();
//             $table->timestamp('email_verified_at')->nullable();
//             $table->string('password');
//             $table->string('phone')->nullable();
//             $table->string('location')->nullable();
//             $table->text('about')->nullable();
//             $table->rememberToken();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('users');
//     }
// };
