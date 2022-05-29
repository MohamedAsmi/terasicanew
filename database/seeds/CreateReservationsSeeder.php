<?php

use Illuminate\Database\Seeder;
use App\Reservation;


class CreateReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $reservation = [
            [
                'r_name'=>'admin1',
               'num_of_book'=>'1',
               'date'=>'2022-05-29 08:27:19',
                'clock_time'=>'2022-05-29 08:27:19',
               
            ],
            [
                'r_name'=>'admin2',
                'num_of_book'=>'2',
                'date'=>'2022-05-29 08:27:19',
                 'clock_time'=>'2022-05-29 08:27:19',
             ],
            [
                'r_name'=>'admin3',
                'num_of_book'=>'3',
                'date'=>'2022-05-29 08:27:19',
                 'clock_time'=>'2022-05-29 08:27:19',
            ],
        ];
  
        foreach ($reservation as $key => $value) {
            Reservation::create($value);
        }
    }
}