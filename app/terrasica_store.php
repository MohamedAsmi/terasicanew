<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class terrasica_stores extends Model
{
    protected $fillable = [
        'store_status',
        'status',
        'store_name',
        'store_description',
    ];
}
