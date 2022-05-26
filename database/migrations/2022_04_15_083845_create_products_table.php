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
            $table->foreignId('brand_id')->constrained ('brands');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('subsubcategory_id')->constrained('sub_sub_categories')->onDelete('cascade');
            $table->string('product_name_en');
            $table->string('product_name_bn');
            $table->string('product_slug_en');
            $table->string('product_slug_bn');
            $table->string('product_code');
            $table->integer('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_bn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_bn')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_bn');
            $table->decimal('selling_price', $precision = 8, $scale = 2);
            $table->decimal('discount_price', $precision = 8, $scale = 2)->nullable();
            $table->text('short_descp_en');
            $table->text('short_descp_bn');
            $table->longtext('long_descp_en');
            $table->longtext('long_descp_bn');
            $table->string('product_thambnail');
            $table->boolean('hot_deals')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('special_offer')->default(false);
            $table->boolean('special_deals')->default(false);
            $table->boolean('status')->default(false);
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
