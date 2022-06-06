<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    protected $fillable = [
        'Grp_chat_id',
        'chat_id',
        'sender_id',	
        'receive_id',
        'chat_main_id'	
    ];
}
