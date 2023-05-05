<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_type', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('incident_name_en')->nullable();
            $table->string('incident_description_en')->nullable();
            $table->string('incident_name_fr')->nullable();
            $table->string('incident_description_fr')->nullable();
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
        Schema::dropIfExists('incident_type');
    }
}
