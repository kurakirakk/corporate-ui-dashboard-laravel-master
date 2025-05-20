<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = ['nik', 'name', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function getAuthIdentifierName() {
        return 'nik';
    }
}

