<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('product_id')->nullable();
            $table->string('option_title_en')->nullable();
            $table->string('option_title_fr')->nullable();
            $table->text('additional_information_en')->nullable();
            $table->text('additional_information_fr')->nullable();
            $table->string('option_price')->nullable();
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
        Schema::dropIfExists('product_options');
    }
}
