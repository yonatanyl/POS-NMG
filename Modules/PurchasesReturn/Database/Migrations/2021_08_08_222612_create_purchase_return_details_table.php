<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_return_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_return_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('quantity');
            $table->decimal('jmlkg', 8, 2);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('unit_price');
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('product_discount_amount');
            $table->string('product_discount_type')->default('fixed');
            $table->unsignedBigInteger('product_tax_amount');
            $table->foreign('purchase_return_id')->references('id')
                ->on('purchase_returns')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')
                ->on('products')->nullOnDelete();
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
        Schema::dropIfExists('purchase_return_details');
    }
}
