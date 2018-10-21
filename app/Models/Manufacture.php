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

    public function updateManuById($id, $name, $add)
    {
        $manu = Manufacture::find($id);
        $manu->name = $name;
        $manu->address = $add;
        $manu->updated_at = date('Y-m-d H:i:s');

        if($manu->save()){
            return true;
        }
        return false;
    }

    public function getInfoDataManuById($id)
    {
        $info = Manufacture::find($id);
        if(is_object($info) && $info !== null){
            $info->toArray();
        }
        return $info;
    }

    public function deleteManuById($id)
    {
        if(Manufacture::where('id',$id)->delete()){
            return true;
        }
        return false;
    }

    public function getAllDataManufacture($keyword,$limit = 2)
    {
        $data = Manufacture::where('name','LIKE','%'.$keyword.'%')
                           ->paginate($limit);
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
