<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'donation_id', 'user_id', 'claimed_at', 'booking_code',
    ];
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
