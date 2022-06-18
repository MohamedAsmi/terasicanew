<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert($this->data());
    }

    public function data()
    {
        return [
            ["p_name"=>"Coca Cola Zero Sugar Drink","userid"=>"3","hinda"=>"300.00","qty"=>"30","review"=>"5.0","osio"=>"123","v_muo"=>"123","status"=>"123","created_at"=>"2022-02-10 06:01:25"],
            ["p_name"=>"Sprite","userid"=>"2","hinda"=>"125.00","qty"=>"20","review"=>"4.9","osio"=>"das","v_muo"=>"1234","status"=>"123","created_at"=>"2022-03-11 07:11:25"],
            ["p_name"=>"Pepsi","userid"=>"3","hinda"=>"75.00","qty"=>"25","review"=>"4.0","osio"=>"12345","v_muo"=>"test","status"=>"123","created_at"=>"2022-04-12 08:21:25"],
          ];
    }
}
