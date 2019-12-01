<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblExamineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_examinees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('examinee_number')->unique();
            $table->string('name');
            $table->string('address');
            $table->date('birth_date');
            $table->string('gender')->enum('Male,Female');
            $table->string('cellnumber');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('school_year_id');
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
        Schema::dropIfExists('tbl_examinees');
    }
}
