<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Carbon\Carbon;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function register()
    {
        return view("register");
    }

    public function login()
    {
        return view("login");
    }

    public function index()
    {
        return view("home");
    }

    public function dashboard(){
        return view("dashboard");
    }
}
