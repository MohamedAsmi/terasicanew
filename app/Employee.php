<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id',
        'e_name',
        'e_email',
        'e_status',
        'e_tel',
        'work_task', 
        'n_of_h_week', 
        'last_spot',
      
    ];
}
