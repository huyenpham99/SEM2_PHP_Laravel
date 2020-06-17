<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function latestProducts(Request $request)
    {
        $limit = $request->has("limit") ? $request->get("limit") : 10;
        $page = $request->has("page") ? $request->get("page") : 1;
        //nếu có thì lấy 10 sản phảm, còn ko có thì lấy trang đầu
        $products = Product::orderby("created_at", "DESC")->offset($limit * ($page - 1))
            ->limit(10)->get()->toArray();
        return response()->json($products);
//         $products =Product::orderby("created_at", "DESC")->limit(10)->get(); nếu viết như này chỉ có 10 sp


    }
}
