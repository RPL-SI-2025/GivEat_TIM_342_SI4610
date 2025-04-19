<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Recipient;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_id',
        'donation_id',
        'claim_date',
    ];

    public function Recipient()
    {
        return $this->belongsTo(Recipient::class, 'recipient_id', 'user_id');
    }

    public function Donation()
    {
        return $this->belongsTo(Donation::class, 'donation_id', 'id_donation');
    }


}