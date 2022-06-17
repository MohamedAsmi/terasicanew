<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class terrasica_products extends Model
{
    protected $fillable = [
        'product_status',
        'product_name',
        'product_description',
        'product_price',
    ];
}
