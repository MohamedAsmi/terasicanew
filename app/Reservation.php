<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
class Reservation extends BaseModel
{
    protected $fillable = [
        'r_id',
        'r_name',
        'num_of_book', 
        'date', 
        'clock_time',
      
    ];
}