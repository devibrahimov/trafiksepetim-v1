<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'market_id' => 30,
                'category' => json_encode([ "category"=>"14", "subcategory"=>"44", "secondsubcategory" => null]),
                'name'   =>  ''











            ]
        );
    }
}
