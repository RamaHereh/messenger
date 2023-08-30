<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Pivot
{
    use HasFactory;
    public $timestamp = false;
    protected $casts = [
        'joined_at' => 'datetime'
    ];

    public function conversation(){
        return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

