<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminLogined
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // khi ma 1 request gui len thi md se kiem tra - luat kiem tra dung hay sai do lap trinh vien dinh nghia
        // $next - cho phep request cua nguoi dung gui len duoc di tiep hay dc lam cai gi do tiep theo
        if(!$this->checkAdminLogined()){
            // bat quay ve trang dang nhap
            return redirect()->route('admin.formLogin');
        }
        return $next($request);
    }

    private function checkAdminLogined()
    {
        // can kiem tra cac session cua nguoi dang nhap co ton tai khong
        // chung ta se su dung session global
        $user = Session::get('username');
        $email = Session::get('email');
        if(empty($user) || empty($email)){
            return false;
        }
        return true;
    }
}
