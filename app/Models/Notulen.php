<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    protected $table = 'notulen';
    protected $fillable = [
        'nama_notulen',
        'meeting_id',
        'size_notulen',
        'uploaded_by',
        'uploaded_at',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
