<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('speciality');
            $table->string('qualification');
            $table->string('national_number');
            $table->integer('entity_acceptance_number');
            $table->date('entity_acceptance_date');
            $table->date('birth_day');
            $table->string('nationality');
            $table->string('job');

            $table->unsignedBigInteger('school_id');

            $table->foreign('school_id')
                ->references('id')
                ->on('schools');

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
        Schema::dropIfExists('teachers');
    }
}
