<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->integer('school_fees');
            $table->integer('actual_fees');
            $table->integer('total');
            $table->integer('remainder');

            $table->unsignedBigInteger('financial_year_id');
            $table->foreign('financial_year_id')
                ->references('id')
                ->on('financial_years')
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
        Schema::dropIfExists('budgets');
    }
}
