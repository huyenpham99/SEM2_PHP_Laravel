<?php

namespace App\Http\Controllers\Auth;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if (Cart::where("user_id", $user->__get("id"))
        ->where("is_checkout", true)->exists()){
            $myCart = session()->has("my_cart") && is_array(session("my_cart")) ? session("my_cart") : [];
            $mycart =[];
            $cart =Cart::where("user_id", $user->__get("id"))
                ->where("is_checkout", true)->first();
            $items = $cart->getItems;
            foreach ($items as $item) {
                foreach ($mycart as $key => $c) {
                    if ($c["product_id"] == $item->__get("id")) {
                        $mycart[$key]["qty"] += $item->pivot->__get("pivot_qty");
                        $contain = true;
                    }
                }
                if (!$contain) {
                    $mycart[] = [
                        "product_id" => $item->__get("id"),
                        "qty" => $item->__get("pivot_qty")
                    ];

                }
            }
            session(["my_cart"=>$mycart]);
        }

        //viết override lại hàm có sẵn
        //xử lý khi đăng nhập sẽ làm gì
    }
}
