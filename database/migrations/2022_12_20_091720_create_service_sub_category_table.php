<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sub_category', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('service_id',10)->nullable();
            $table->string('service_category_id',10)->nullable();
            $table->string('sub_categ_name');
            $table->string('description');
            $table->string('path');
            $table->string('photo');
            $table->string('status');
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
        Schema::dropIfExists('service_sub_category');
    }
}
