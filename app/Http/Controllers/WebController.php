<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Carbon\Carbon;
use DemeterChain\C;
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
        //lay tat ca
    $category = Category::paginate();
        //show validation theo ten D%
      //  $category =Category::where ("category_name", "LIKE", "D%")->get();
        return view ("category.list",[
            "categories" =>$category]);
        //
    }
    public function newCategory(){
        return view ("category.new");
    }
    public function saveCategory(Request $request){
     //validate du lieu
        $request->validate([
            "category_name" =>"required|string|min:6|unique:categories"
        ]);
        try {
//tự động cập nhật thời gian cho category
            Category::create([
                "category_name"=>$request->get("category_name")
            ]);

           // "updated_at"=>Carbon::now(),
            //            DB::table("categories") ->insert([
//                "category_name" =>$request->get("category_name"),
//                "created_at"=>Carbon::now(),
//
        } catch (\Exception $exception){
            return redirect() ->back();
        }
        return redirect()->to("/list-category");
    }
    public function editCategory($id){
        $category = Category::findOrFail($id);
//        if (is_null($category))
//            abort(404); =findOrFail
        return view("category.edit", ["category"=>$category]);
    }
    public function updateCategory($id, Request $request){
        $category = Category::findOrFail($id);
        $request->validate([
            "category_name" =>"required|min:6|unique:categories,category_name,{$id}"
        ]);
        // die("loi");
        //      dd($request->all());
        try {
            $category->update([
                "category_name"=>$request->get("category_name")
            ]);
        }catch (\Exception $exception){
            dd($exception->getMessage());
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }
    public function deleteCategory($id){
        $category =Category::findOrFail($id);
        try {
            $category ->delete();
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }



    public function listBrand(){
        //lay tat ca
        $brand = Brand::paginate();
        //show validation theo ten D%
        //  $category =Category::where ("category_name", "LIKE", "D%")->get();
        return view ("brand.list",[
            "brands" =>$brand]);
        //
    }
    public function newBrand(){
        return view ("brand.new");
    }
    public function saveBrand(Request $request){
        //validate du lieu
        $request->validate([
            "brand_name" =>"required|string|min:6|unique:brands"
        ]);
        try {
//tự động cập nhật thời gian cho category
            Brand::create([
                "brand_name"=>$request->get("brand_name")
            ]);

            // "updated_at"=>Carbon::now(),
            //            DB::table("categories") ->insert([
//                "category_name" =>$request->get("category_name"),
//                "created_at"=>Carbon::now(),
//
        } catch (\Exception $exception){
            return redirect() ->back();
        }
        return redirect()->to("/list-brand");
    }
    public function editBrand($id){
        $brand = Brand::findOrFail($id);
//        if (is_null($brand))
//            abort(404); =findOrFail
        return view("brand.edit", ["brand"=>$brand]);
    }
    public function updateBrand($id, Request $request){
        $brand = Brand::findOrFail($id);
        $request->validate([
            "brand_name" =>"required|min:6|unique:brands,brand_name,{$id}"
        ]);
        // die("loi");
        //      dd($request->all());
        try {
            $brand->update([
                "brand_name"=>$request->get("brand_name")
            ]);
        }catch (\Exception $exception){
            dd($exception->getMessage());
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }
    public function deleteBrand($id){
        $brand =Brand::findOrFail($id);
        try {
            $brand ->delete();
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-brand");
    }

}
