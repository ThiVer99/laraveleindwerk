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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('photo_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('body');
            $table->decimal('price',8,2);
            $table->foreignId('gender_id')->unsigned()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('products');
    }
};
