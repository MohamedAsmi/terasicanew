<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'chat_id',
        'message',
        'date',
        'status',
        'type',
        'chat_main_id'
    ];
}
