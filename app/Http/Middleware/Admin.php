<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        //đang lấy nguowid dùng hiện tại
        //lấy ra đối tượng đang đăng nhập
        if (!Auth::check())
            return redirect()->to("login");
        $currentUser = Auth::user();
        //xác nhận chức năng kiểm soát
        if ($currentUser->__get("role") !=User::AD_MIN_ROLE)
            return abort(404);
        return $next($request);
    }
}
