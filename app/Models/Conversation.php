<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'label', 'type'];

    public function messages(){
        return $this->hasMany(Message::class, 'conversation_id', 'id')
                ->latest();              
    }

    public function conCreator(){
        return $this->belongsTo(User::class, 'user_id', 'id')
                    ->withDefault(['name'=>__('User')]);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'participants')
                    ->withPivot('role', 'joined_at');
    }

    public function lastMessage(){
        return $this->belongsTo(Message::class, 'last_message_id', 'id')
                ->withDefault();
    }
}
