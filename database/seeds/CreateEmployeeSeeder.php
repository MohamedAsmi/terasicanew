<?php

use Illuminate\Database\Seeder;
use App\Employee;

class CreateEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [
             [
                 'e_name'=>'admin1',
                'work_task'=>'1',
                'n_of_h_week'=>'2022-05-29 08:27:19',
                 'last_spot'=>'2022-05-29 08:27:19',
                
             ],
             [
                 'e_name'=>'admin2',
                 'work_task'=>'2',
                 'n_of_h_week'=>'2022-05-29 08:27:19',
                  'last_spot'=>'2022-05-29 08:27:19',
              ],
             [
                 'e_name'=>'admin3',
                 'work_task'=>'3',
                 'n_of_h_week'=>'2022-05-29 08:27:19',
                  'last_spot'=>'2022-05-29 08:27:19',
             ],
         ];
   
         foreach ($employee as $key => $value) {
            Employee::create($value);
         }
     }
}
