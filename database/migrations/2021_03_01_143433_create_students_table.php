<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('national_number');
            $table->string('guardian_name');
            $table->string('guardian_national_number');
            $table->string('email');
            $table->boolean('ministry_nomination')->default(false);
            $table->boolean('school_nomination')->default(false);
            $table->unsignedBigInteger('program_school_id');
            $table->foreign('program_school_id')
                ->references('id')
                ->on('program_school');
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
        Schema::dropIfExists('students');
    }
}
