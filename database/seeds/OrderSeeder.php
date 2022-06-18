<?php

use Illuminate\Database\Seeder;
use App\Models\Orders;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orders::insert($this->data());
    }

    public function data()
    {
        return [
            ["orderid"=>"1","userid"=>"3","itemid"=>"2,3","subscriberid"=>"1","created_at"=>"2022-02-10 06:01:25"],
            ["orderid"=>"2","userid"=>"2","itemid"=>"2,1","subscriberid"=>"2","created_at"=>"2022-03-11 07:11:25"],
            ["orderid"=>"3","userid"=>"3","itemid"=>"1","subscriberid"=>"3","created_at"=>"2022-04-12 08:21:25"],
            ["orderid"=>"4","userid"=>"3","itemid"=>"3","subscriberid"=>"2","created_at"=>"2022-04-12 08:21:25"],
            ["orderid"=>"5","userid"=>"2","itemid"=>"2","subscriberid"=>"2","created_at"=>"2021-08-02 08:21:25"],
            ["orderid"=>"6","userid"=>"3","itemid"=>"3,1","subscriberid"=>"2","created_at"=>"2022-05-29 08:21:25"],
            ["orderid"=>"7","userid"=>"3","itemid"=>"1","subscriberid"=>"1","created_at"=>"2022-04-12 08:21:25"],
            ["orderid"=>"8","userid"=>"2","itemid"=>"1","subscriberid"=>"3","created_at"=>"2022-04-12 08:21:25"],
            ["orderid"=>"9","userid"=>"3","itemid"=>"3","subscriberid"=>"2","created_at"=>"2022-02-22 08:21:25"],
            ["orderid"=>"10","userid"=>"3","itemid"=>"3,2","subscriberid"=>"2","created_at"=>"2022-03-10 08:21:25"],
            ["orderid"=>"11","userid"=>"2","itemid"=>"1","subscriberid"=>"1","created_at"=>"2022-05-12 08:21:25"],
          ];
    }
}
