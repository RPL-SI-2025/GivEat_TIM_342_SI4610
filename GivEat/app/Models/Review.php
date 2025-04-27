<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_restoran',
        'nama_hidangan',
        'penilaian',
        'foto_makanan',
        'deskripsi_ulasan',
        'tag',
    ];

    // Relasi Review ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
