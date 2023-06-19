<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->string('status');
            $table->decimal('total_price',6,2);
            $table->string('session_id');
            $table->timestamps();
        });

        Schema::create('order_product',function (Blueprint $table){
            $table->id();
            $table->foreignId('order_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->foreignId('color_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->foreignId('size_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->decimal('product_price',8,2);
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
