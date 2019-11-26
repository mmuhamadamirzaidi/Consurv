<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->enum('role', ['Admin', 'Doctor', 'Patient']);
            $table->enum('gender', ['F', 'M'])->nullable();

            $table->string('phone_number', 17)->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->bigInteger('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('rig_id')->nullable()->unsigned();
            $table->foreign('rig_id')->references('id')->on('rigs');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
