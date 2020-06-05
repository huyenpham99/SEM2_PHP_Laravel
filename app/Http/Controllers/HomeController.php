<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Psy\Util\Str;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
//        foreach ($categories as $p){
//            $slug = \Illuminate\Support\Str::slug($p->__get("category_name"));
//            $p->slug =$slug.$p->__get("id");
//            $p->save();
//        }
//        die("done");
        $most_views =Product::orderBy("view_count", "DESC")->limit(8)->get();
        $featured =Product::orderBy("updated_at", "DESC")->limit(8)->get();
        $latest_1 =Product::orderBy("updated_at", "DESC")->limit(3)->get();
        $latest_2 =Product::orderBy("updated_at", "DESC")->offset(3)->limit(3)->get();
        //limit :lấy 3 thằng
        //offset : bỏ đi 3 thằng đầu tiên
        //offset = (page-1)*limit
        return view("frontend.home",[
            "categories"=>$categories,
            "most_views"=>$most_views,
            "featured" =>$featured,
            "latest_1"=>$latest_1,
            "latest_2"=>$latest_2
        ]);

    }
    public function category(Category $category){
            $products = $category->Products()->paginate(12);
      return view("frontend.category",[
          "category" =>$category,
          "products"=>$products
          //lấy những sản phẩm thuộc category đó
          //dùng thuận lơi cho việc nếu sau này có đổi tên category
      ]);
    }
    public function product(Product $product){
    //    $products = $product->Products()->paginate(12);
        if (!session()->has("view_count_{$product->__get("id")}"))
        $product->increment("view_count");
        session(["view_count_{$product->__get("id")}"=>true]);
        //đếm số lần xem sản phẩm
        //nếu f5 thì số lần view sẽ k tăng nếu session đã được lưu


        $relativeProduct = Product::with("Category")->paginate(4);
        return view("frontend.product",[
            "product"=>$product,
            "relativeProducts"=>$relativeProduct
        ]);
    }

    public function addToCart(Product $product,Request $request){
        $qty = $request->has("qty") && (int)$request->get("qty")>0?(int)$request->get("qty"):1;// kiểm tra qty co phai number hay khong
        // lay qty kiem tra neu la int > 0 thi se tra ve = qty = 1
        $myCart = session()->has("my_cart") && is_array(session("my_cart"))?session("my_cart"):[];
        // kiem tra session neu co truong my_cart va mang my_cart neu khong co se truyen vao 1 mang rong~
        // nguyen tac lam trang gio hang se tang so luong chu khong tang san pham vao
        $content = false; // dat 1 bien de kiem tra trang thai san pham co hay chua
        foreach ($myCart as $item){
            if($item["product_id"] == $product->__get("id")){ // nếu sản phẩm đã có trong giỏ
                $item["qty"]+=$qty; // nếu có thì sẽ truyền thêm vào biến qty ở trên
                $content = true; // neu co san pham se truyen trang thai ve true
                break;
            }

        }
        if(!$content){ // nếu trả về true sẽ trả về 1 mảng mycart mới truyền vào qty và id sản phẩm hiện tại
            $myCart[] = [
                "product_id" => $product->__get("id"),
                "qty" => $qty
            ];
        }
//        dd($myCart);
        // nap lai session cũ
        session(["my_cart" => $myCart]);
        // return redirect về trang trước
        return redirect()->to("/shopping-cart");
    }
    public function shoppingCart(){
        $myCart = session()->has("my_cart") && is_array(session("my_cart"))?session("my_cart"):[];
        $productIds = [];
        foreach ($myCart as $item){
            $productIds[] = $item["product_id"];
        }
        $grandTotal = 0;
        $products = Product::find($productIds);
        foreach ($products as $p){
            foreach ($myCart as $item){
                if($p->__get("id") == $item["product_id"]){
                    $grandTotal += ($p->__get("price")*$item["qty"]);
                    $p->cart_qty = $item["qty"];
                }
            }
        }
        return view("frontend.cart",[
            "products"=>$products,
            "grandTotal" => $grandTotal
        ]);
    }

    public function checkout(){
        return view("frontend.checkout");
    }
}
