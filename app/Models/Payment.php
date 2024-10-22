<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount',
        'payment_date',
        'payment_method',
        'participant_id',
        'event_id'
    ];

    // Relations
    public function participant()
    {
        return $this->belongsTo(User::class, 'participant_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
