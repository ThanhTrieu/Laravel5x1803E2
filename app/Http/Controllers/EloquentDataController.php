<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // import model
use App\Models\Admin; // import model

class EloquentDataController extends Controller
{
    public function test(Product $product, Admin $admin)
    {
    	//$data = $product->getAllDataProducts();
    	//$data = $product->getDataById(1);
    	$data = $product->selectData();
    	foreach($data as $key => $item){
    		echo $item->name;
    		echo "<br/>";
    	}
    	$dt = $product->joinData(1);
    	//dd($dt);
    	//dd($data);
        $add = $admin->myInsert('');
    }
}
