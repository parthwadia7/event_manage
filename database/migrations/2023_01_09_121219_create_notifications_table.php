<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('user_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('delivery_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('msg_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('msg_fr')->nullable();
            $table->string('seen')->nullable();
            $table->string('is_read')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
