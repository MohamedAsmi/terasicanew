<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;

class Product extends BaseModel
{
   protected $fillable = [
        'p_name',
        'osio',
        'hinda',
        'v_muo', 
        'status'
      
    ];
}
