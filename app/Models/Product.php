<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function categories()
    {
    	return $this->belongsTo('App\Models\Categorie','catid');
    }

    public function manufactures()
    {
    	return $this->belongsTo('App\Models\Manufacture','manuid');
    }

    public function systems()
    {
    	return $this->belongsTo('App\Models\System','sysid');
    }

    public function getAllDataProducts()
    {
    	$data = Product::all();
    	return $data;
    }

    public function getDataById($id)
    {
    	return Product::find($id);
    }

    public function selectData()
    {
    	/*
    	$data = Product::select('name')
    	               ->where('id','>',3)
    	               ->get();
    	               */
    	$data = Product::select('name')
    	               ->whereIn('id',[1,2,3,4])
    	               ->get();         
    	return $data;
    }

    public function countData()
    {
    	return Product::count();
    }

    public function joinData($id)
    {
    	$dt = Product::select('products.name AS namePd, categories.catname, systems.name AS SysName, manufactures.name AS ManuName')
    	        ->join('categories','categories.id','=','products.catid')
    	        ->join('systems','systems.id','=','products.sysid')
    	        ->join('manufactures', 'manufactures.id','=','products.manuid')
    	        ->where('products.id',$id)
    	        ->first();

    	return $dt;
    }
}
