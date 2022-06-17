<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class terrasica_reviews extends Model
{
    protected $fillable = [
        'star_count',
        'reviewer_id',
        'reviewer_message',
        'product_id',
        'store_id',
    ];
}
