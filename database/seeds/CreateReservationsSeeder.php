<?php

use Illuminate\Database\Seeder;
use App\User;


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
               'name'=>'Admin',
               'email'=>'shamsudeenasmi96@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@itsolutionstuff.com',
                 'is_admin'=>'2',
                'password'=> bcrypt('123456'),
             ],
            [
               'name'=>'User',
               'email'=>'shamsudeenasmi696@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($reservation as $key => $value) {
            User::create($value);
        }
    }
}