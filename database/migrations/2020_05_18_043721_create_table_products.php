<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->text("product_desc");
            $table->decimal("price", 12,4);
            $table->unsignedInteger("qty") ->default(1); //gia tri mac dinh do mk dat
            $table->unsignedBigInteger("category_id"); //khoa ngoai
            $table->foreign("category_id")->references("id")->on("categories");
            //gán khóa ngoại cho bảng category
            //reference: tham chiếu đến column id của bảng categories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
