<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\checkLoginAdminPost;
use App\Models\Admin;

class LoginController extends Controller
{
	private $db;
	public function __construct(Admin $admin)
	{
		$this->db = $admin;
	}

    public function showForm(Request $request)
    {
    	$errors = $request->state;
    	return view('admin.login.showform',['mess'=>$errors]);
    }

    public function handle(checkLoginAdminPost $request)
    {
    	$username = $request->user;
    	$username = strip_tags($username);

    	$password = $request->pass;
    	$password = strip_tags($password);

    	//validate data
    	// validation form cua laravel
    	// kiem tra xem nguoi dung dap nhap dung hay khong ?
    	$infoAdmin = $this->db->checkAdminLogin($username,$password);
    	if($infoAdmin){
    		// ton tai user
    		// luu thong tin cua nguoi dung vao session
    		// su dung session cua laravel
    		$request->session()->put('username',$infoAdmin['username']);
    		// $_SESSION['username'] = $infoAdmin['username'];
    		$request->session()->put('email',$infoAdmin['email']);
    		$request->session()->put('role',$infoAdmin['role']);
    		$request->session()->put('status',$infoAdmin['status']);
    		// cho di vao trang dashboard
    		return redirect()->route('admin.dashboard');
    	} else {
    		// khong ton tai user - quay ve form login
    		return redirect()->route('admin.formLogin',['state'=>'fail']);
    	}
    }

    public function logout(Request $request)
    {
        // xoa bo cac session ma login no tao ra
        // xoa tung cai
        $request->session()->forget('username');
        // unset($_SESSION['username']);
        $request->session()->forget('role');
        $request->session()->forget('email');
        $request->session()->forget('status');
        // xoa all
        // $request->session()->flush();
        // session_destroy();
        // quay ve trang login
        return redirect()->route('admin.formLogin');
    }
}
