<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    //khóa chính là id thì ko cần phải viết lại
    //loc cac trường còn lại của bảng
    //Model (ORM)
    public $fillable = [
        "category_name"
    ];

    public function get($key)
    {
        if (is_null($this->get($key)))
            return "default value";
        return $this->get($key);
    }


}
