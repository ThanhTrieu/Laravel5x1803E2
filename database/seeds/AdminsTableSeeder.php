<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 30 ; $i++) { 
        	DB::table('admins')->insert([
        		'username' => 'admin_' . $i,
        		'password' => '123456789',
        		'role' => -1,
        		'status' => 1,
        		'email' => 'admin_'.$i.'@gmail.com',
        		'phone' => '098765488',
        		'address' => 'Ha noi',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
