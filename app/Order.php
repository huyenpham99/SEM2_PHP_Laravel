<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
        "user_id",
        "grand_total",
        "username",
        "address",
        "telephone",
        "note",
        "status"
    ];
    //dinh nghia cac trang thai them 2 hang so
    public const PENDING = 0;
    public const PROCESS = 1;
    public const SHIPPING = 2;
    public const COMPLETE = 3;
    public const CANCEL = 4;
}
