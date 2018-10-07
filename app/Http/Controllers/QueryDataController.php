<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryDataController extends Controller
{
    // ham lay all du lieu cua 1 bang nao do
    public function getAllDataTable($table)
    {
    	$data = DB::table($table)->get();
    	//dd : ham cua laravel - var_dump + die
    	dd($data);
    }

    public function selectData($table)
    {
    	//$data = DB::table($table)->select('id')->get();
    	/*
    	$data = DB::table($table)->select('*')
    	                         ->where('id',3)
    	                         ->where('username','admin_1')
    	                         ->where('email','admin_2@gmail.com')
    	                         ->first();
    	                         */
    	/*                       
    	$data = DB::table($table)->select('*')
    	                         ->where([
    	                         	'id' => 3,
    	                         	'username' => 'admin_1',
    	                         	'email' => 'admin_2@gmail.com'
    	                         ])->first();
    	 */
    	
    	/*
    	$data = DB::table($table)->select('*')
    	                         ->where('id',3)
    	                         // ->orWhere('username','admin_1')
    	                         // ->orWhere('email','admin_2@gmail.com')
    	                         ->orWhere([
    	                         	'username' => 'admin_1',
    	                         	'email' => 'admin_2@gmail.com'
    	                         ])->get();
    	*/   
                        
    	$data2 = DB::table($table)->select('*')
    	                          ->where('id','>',2)
    	                          ->get();

    	// select * from $table where id > 2;    
    	$data3 = DB::table($table)->select('*')
    	                          ->whereBetween('id',[3,5])
    	                          ->get();

    	$data4 = DB::table($table)->select('*')
    	                          //->whereIn('id',[1,2,3,4,5,6])
    	                          ->whereNotIn('id',[1,2,3])
    	                          ->get(); 

    	// count data table - rows data
    	$data5 = DB::table($table)->count();
    	$data6 = DB::table($table)->max('id');  
    	$data7 = DB::table($table)->min('id');
    	// products
    	//$data8 = DB::table($table)->where('status',1)->avg('price');

    	// $data9 = DB::table($table)->select('role')
    	// 						  ->where('status',1)
    	// 						  ->distinct()
    	// 						  ->get();  

    	$data10 = DB::table($table)->select('*')
    	                           ->where('status',10)
    	                           ->doesntExist();
    	                           //->exists();
    	//dd($data10);
    	// lam viec bang product
    	// cho biet san pham co id  = 1 thuoc nha san xuat nao, danh muc nao va he dieu hanh la gi ?
    	/*
    	$data11 = DB::table($table)->select('manufactures.name AS manuName','categories.catname','systems.name AS sysName','products.name AS pdName')
    	                           ->join('manufactures','manufactures.id','=','products.manuid')
    	                           ->join('categories','categories.id','=','products.catid')
    	                           ->join('systems','systems.id','=','products.sysid')
    	                           ->where('products.id',1)
    	                           ->first();
    	*/

    	//dd($data11);
    	  
    	// insert data
    	// $insert = DB::table($table)->insert([
    	// 	'username' => 'trieunt',
    	// 	'password' =>  'password',
    	// 	'role' => -1,
    	// 	'status' => 1,
    	// 	'email' => 'trieunt@gmail.com',
    	// 	'phone' => '0987654',
    	// 	'address' => 'Ha Noi',
    	// 	'created_at' => date('Y-m-d H:i:s'),
    	// 	'updated_at' => null
    	// ]);
    	
    	//      if($insert){
    	// 	dd('OK');
    	// } else {
    	// 	dd('Fail');
    	// } 
    	// update data
    	$up = DB::table($table)->where('id',31)
    	                       ->update([
    	                       	'username' => 'trieunt123',
    	                       	'password' => md5('12345')
    	                       ]);

    	if($up){
    		dd('OK');
    	} else {
    		dd('Fail');
    	}                   
    }

    // delete data
    public function deleteData($table, $id)
    {
    	$del = DB::table($table)->where('id','>',$id)->delete();
    	if($del){
    		dd('OK');
    	} else {
    		dd('ERR');
    	}
    }

    public function showData(){
    	$data = DB::table('porducts')->get();
    	foreach($data as $key => $item){
    		echo $item->name; // $item['id']
    		echo "<br/>";
    	}
    }
}
