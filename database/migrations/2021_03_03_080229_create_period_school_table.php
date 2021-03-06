<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_school', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('period_id');

            $table->integer('initial_value')->default(0); // this = school->program->price * school->program->students * period->financial_ratio
            $table->integer('deserved_value')->default(0); // this = initial_value - (school->program->students->absence_days * school->program->day_price + punishment)
            $table->foreign('period_id')->references('id')
                ->on('periods')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('school_id')->references('id')
                ->on('schools')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('period_school');
    }
}
