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
            $table->integer('id', 11);
            $table->string('product_name_en')->nullable();
            $table->string('product_name_fr')->nullable();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('price')->nullable();
            $table->string('actual_price')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            
            $table->string('path')->nullable();
            $table->string('photo')->nullable();
            $table->string('color')->nullable();
            $table->string('status')->nullable();
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
