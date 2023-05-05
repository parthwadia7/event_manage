<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('role_id',10)->comment('1 means admin, 2 means vendor,3 means users,4 means delivery person');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->text('device_token')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->text('location')->nullable();
            $table->string('language')->default(0)->comment('fr means french, en means english');
            $table->string('is_active')->default(0)->comment('0 means active, 1 means deactive');
            $table->string('notification_setting')->default(0)->comment('0 means on, 1 means off');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
