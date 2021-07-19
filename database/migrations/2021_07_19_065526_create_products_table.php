<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_ind');
            $table->string('product_slug_en');
            $table->string('product_slug_ind');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_ind');
            $table->string('product_size_en')->nullablel();
            $table->string('product_size_ind')->nullablel();
            $table->string('product_color_en');
            $table->string('product_color_ind');
            $table->string('selling_price');
            $table->string('discount_price')->nullablel();
            $table->string('short_descp_en');
            $table->string('short_descp_ind');
            $table->string('long_descp_en');
            $table->string('long_descp_ind');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullablel();
            $table->integer('featured')->nullablel();
            $table->integer('special_offer')->nullablel();
            $table->integer('special_deals')->nullablel();
            $table->integer('status')->default(0);
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
