<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipients extends Pivot
{
    use HasFactory, softDeletes;
    public $timestamp = false;
    protected $casts = [
        'read_at' => 'datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function message(){
        return $this->belongsTo(Message::class, 'message_id', 'id');
    }
}

