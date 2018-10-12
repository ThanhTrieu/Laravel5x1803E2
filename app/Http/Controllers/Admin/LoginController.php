<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showForm()
    {
    	return view('admin.login.showform');
    }

    public function handle(Request $request)
    {
    	dd($request->user);
    }
}
