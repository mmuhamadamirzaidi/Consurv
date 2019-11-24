<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_informations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('users');

            $table->double('weight', 6, 2)->nullable();
            $table->double('height', 6, 2)->nullable();
            $table->string('hdlc', 10)->nullable();
            $table->string('blood_pressure', 10)->nullable();
            $table->boolean('treatment')->nullable();
            $table->string('total_cholesterol', 10)->nullable();
            $table->boolean('diabetes')->nullable();
            $table->boolean('smoker')->nullable();
            $table->integer('total_points')->nullable()->default(0);
            $table->string('family_history', 200)->nullable();
            $table->string('medical_history', 200)->nullable();

            $table->tinyInteger('risk_point_age')->nullable();
            $table->tinyInteger('risk_point_hdlc')->nullable();
            $table->tinyInteger('risk_point_cholesterol')->nullable();
            $table->tinyInteger('risk_point_blood_pressure')->nullable();
            $table->tinyInteger('risk_point_diabetes')->nullable();
            $table->tinyInteger('risk_point_smoker')->nullable();
            $table->tinyInteger('risk_point_cvd')->nullable();
            $table->tinyInteger('heart_age')->nullable();
            $table->tinyInteger('risk_level')->nullable();
            
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
        Schema::dropIfExists('health_informations');
    }
}
