<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // lam viec voi bang categories
        for ($i=1; $i <= 5 ; $i++) { 
        	DB::table('categories')->insert([
        		'catname' => 'Test_Cat_' . $i,
        		'parentid' => 0,
        		'status' => 1,
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
         	]);
        }
    }
}
