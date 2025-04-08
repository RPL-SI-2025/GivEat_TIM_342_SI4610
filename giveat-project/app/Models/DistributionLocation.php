<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'latitude',
        'longitude',
        'description',
        'partner_id',
    ];

    // Relasi (jika kamu nanti buat model Partner)
    // public function partner()
    // {
    //     return $this->belongsTo(Partner::class);
    // }
}
