<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupons', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('coupon_name')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('path')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('start_date')->nullable();
            $table->string('exp_date')->nullable();
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
        Schema::dropIfExists('user_coupons');
    }
}
