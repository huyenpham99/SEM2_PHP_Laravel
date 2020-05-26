<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";
    //khóa chính là id thì ko cần phải viết lại
    //loc cac trường còn lại của bảng
    //Model (ORM)
    public $fillable = [
        "brand_name",
        "brand_image",
    ];
    public function getImage(){
        if (is_null($this->__get("brand_image"))){
            return asset("media/brand.jpeg");
        }
        return asset($this->__get("brand_image"));
    }

    public function get($key)
    {
        if (is_null($this->get($key)))
            return "default value";
        return $this->get($key);
    }
}
