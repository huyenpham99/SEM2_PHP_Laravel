<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function register(){
        return view("register");
    }
    public function login(){
        return view("login");
    }
    public function index(){
        return view ("home");
    }
    public function listCategory(){
        $categories = DB::table("categories") ->get();
        dd($categories);
        return view ("category.list");
    }
}
