<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
public $fillable=[
    "product_name",
    "product_desc",
    "price",
    "qty",
    "category_id",
    "brand_id"
];
}
