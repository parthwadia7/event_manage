<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_masters', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('user_id')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('order_number')->nullable();
            $table->string('pickup_area_latitude')->nullable();
            $table->string('pickup_latitude')->nullable();
            $table->string('pickup_longitude')->nullable();
            $table->string('dropoff_area_longitude')->nullable();
            $table->string('dropoff_latitude')->nullable();
            $table->string('dropoff_longitude')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_price')->nullable();
            $table->string('pending_time')->nullable();
            $table->string('order_tip')->nullable();
            $table->string('order_service_del')->nullable();
            $table->string('order_tax')->nullable();
            $table->string('order_status')->default(0)->comment('1 Order Placed,2 Preparing,3 Dispach,4 deliver');
            $table->string('status')->nullable();
            $table->string('order_date')->nullable();
            $table->string('shipping_date')->nullable();
            $table->string('is_delivery_order_or_product_order')->default(0)->comment('0 for product_order and 1 for delivery order');
            $table->string('payment_status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('product_payment_amount')->nullable();
            $table->string('admin_payment_amount')->nullable();
            $table->string('commission')->nullable();
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
        Schema::dropIfExists('order_masters');
    }
}
