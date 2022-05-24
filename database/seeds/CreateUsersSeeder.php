<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'shamsudeenasmi96@gmail.com',
               'name'=>'superAdmin',
               'email'=>'superadmin@itsolutionstuff.com',
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
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}