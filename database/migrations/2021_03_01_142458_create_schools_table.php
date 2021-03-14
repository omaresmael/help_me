<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->index()->unique();
            $table->string('name_english')->index()->unique();
            $table->text('stage');
            $table->text('address');
            $table->integer('phone_number')->index()->unique();
            $table->integer('fax_number');
            $table->string('email')->index()->unique();
            $table->string('type');
            $table->string('license_type');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('part')->nullable();
            $table->string('street')->nullable();
            $table->string('geolocation')->nullable();
            $table->string('general_manager');// iguess it's list of users
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
        Schema::dropIfExists('schools');
    }
}
