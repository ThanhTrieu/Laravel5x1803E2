<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=4 ; $i++) { 
        	DB::table('products')->insert([
        		'name' => 'Test_'.$i,
        		'manuid'=> $i,
        		'sysid' => $i,
        		'catid' => $i,
        		'images' => 'test.jpg',
        		'price' => 120000,
        		'saleoff' => null,
        		'status' => 1,
        		'qty' => 10,
        		'description' => 'this is test db',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
