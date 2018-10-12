<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // model nay no se lam viec cho bang du lieu nao ?
    protected $table = 'admins';

    public function myInsert($user, $pass, $role, $status, $email, $phone, $add)
    {
    	$admin = new Admin;
    	$admin->username = $user;
    	$admin->password = $pass;
    	$admin->role = $role;
    	$admin->status = $status;
    	$admin->email = $email;
    	$admin->phone = $phone;
    	$admin->address = $add;
    	$admin->created_at = date('Y-m-d H:i:s');
    	$admin->updated_at = null;

    	if($admin->save()){
    		return true;
    	}
    	return false;
    }

    public function myUpdate($pass, $id)
    {
    	$admin = Admin::find($id);
    	$admin->password = $pass;

    	if($admin->save()){
    		return true;
    	}
    	return false;
    }

    public function myDelete($id)
    {
    	$admin = Admin::find($id);
    	if($admin->delete()){
    		return true;
    	}
    	return false;
    }
}
