<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // lam viec voi bang systems
        for ($i=1; $i <= 5 ; $i++) { 
        	DB::table('systems')->insert([
        		'name' => 'android_'.$i,
        		'types' => 'adn_'.$i,
        		'status' => 1,
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
