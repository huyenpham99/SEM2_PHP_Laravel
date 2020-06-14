<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table ="carts";
    protected $fillable = [
      "user_id",
      "is_checkout",

    ];

    //lat tat ca san pham thuoc gio hang
    //quan he n-n
    public  function getItems(){
        return $this->belongsToMany("\App\Product", "cart_product")
            ->withPivot(["qty"]);
            //pivot la trung gian cho quan he n-n
    }
}
