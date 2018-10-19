<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $table = 'manufactures';

    public function products()
    {
    	return $this->hasMany('App\Models\Product','id');
    }

    public function deleteManuById($id)
    {
        if(Manufacture::where('id',$id)->delete()){
            return true;
        }
        return false;
    }

    public function getAllDataManufacture()
    {
        $data = Manufacture::all();
        if(is_object($data) && $data !== null){
            $data->toArray();
        }
        return $data;
    }

    public function addDataManufacture($name, $address)
    {
    	$manu = new Manufacture;
    	$manu->name = $name;
    	$manu->address = $address;
    	$manu->status = 1;
    	$manu->created_at = date('Y-m-d H:i:s');
    	$manu->updated_at = null;
    	if($manu->save()){
    		return true;
    	}
    	return false;
    }
}
