<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // lam viec voi bang manufactures
        for ($i=1; $i <= 5 ; $i++) { 
        	DB::table('manufactures')->insert([
        		'name' => 'Manu_' . $i,
        		'address' => 'USA',
        		'status' => 1,
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
         	]);
        }
    }
}
