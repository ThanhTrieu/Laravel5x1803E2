<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'systems';

    public function products()
    {
    	return $this->hasMany('App\Models\Product','id');
    }
}
