<?php

use Illuminate\Database\Seeder;
use App\Models\Subscribers;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscribers::insert($this->data());
    }

    public function data()
    {
        return [
            ["name"=>"subscriber 1","userid"=>"3","created_at"=>"2022-02-10 06:01:25"],
            ["name"=>"subscriber 2","userid"=>"3","created_at"=>"2022-03-11 07:11:25"],
            ["name"=>"subscriber 3","userid"=>"3","created_at"=>"2022-04-12 08:21:25"],
          ];
    }
}
