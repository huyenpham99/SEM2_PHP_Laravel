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
        "brand_name"
    ];

    public function get($key)
    {
        if (is_null($this->get($key)))
            return "default value";
        return $this->get($key);
    }
}
