<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_chat extends Model
{
    protected $fillable = [
        'g_id',
        'group_name',
        'team_members', 
        'status', 
        'avatar'
    ];
}
