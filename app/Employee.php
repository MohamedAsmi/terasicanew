<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id',
        'e_name',
        'work_task', 
        'n_of_h_week', 
        'last_spot',
      
    ];
}
