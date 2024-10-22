<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
        protected $fillable = [
            'title',
            'description',
            'date_start',
            'date_end',
            'location',
            'organisateur_id',
            'category_id'
        ];
    
        // Relations
        public function organizer()
        {
            return $this->belongsTo(User::class, 'organisateur_id');
        }
    
        public function participants()
        {
            return $this->belongsToMany(User::class, 'event-user');
        }
    
        public function category()
        {
            return $this->belongsTo(EventCategory::class, 'category_id');
        }
    
        public function payments()
        {
            return $this->hasMany(Payment::class);
        }
    }
