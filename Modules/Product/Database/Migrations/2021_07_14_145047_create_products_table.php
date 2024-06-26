<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->string('product_code')->unique()->nullable();
            $table->integer('product_quantity');
            $table->unsignedBigInteger('product_cost');
            $table->unsignedBigInteger('product_price');
            $table->string('product_unit');
            $table->decimal('jumlah_kg', 8, 2);
            $table->integer('product_stock_alert');
            $table->integer('product_order_tax')->nullable();
            $table->tinyInteger('product_tax_type')->nullable();
            $table->text('product_note')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete();
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
