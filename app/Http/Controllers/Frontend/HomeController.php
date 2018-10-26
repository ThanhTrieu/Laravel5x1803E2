<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
	private $db;

	public function __construct(Product $product)
	{
		$this->db = $product;
	}

    public function index()
    {
    	$data = $this->db->getAllDataProducts();
    	if(is_object($data) && $data != null){
    		$data = $data->toArray();
    	}
    	
    	return view('frontend.home.index',['data' => $data]);
    }
}
