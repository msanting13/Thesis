<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblExamineeResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_examinee_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('examinee_id');
            $table->integer('verbal_comprehension')->default(0);
            $table->integer('verbal_reasoning')->default(0);
            $table->integer('figurative_reasoning')->default(0);
            $table->integer('quantitative_reasoning')->default(0);
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
        Schema::dropIfExists('tbl_examinee_results');
    }
}
