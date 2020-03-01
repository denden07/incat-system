<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName');
            $table->date('dob');
            $table->unsignedInteger('age');
            $table->string('address');
            $table->string('contactNo');
            $table->string('course');
            $table->string('yearGraduated');
            $table->string('lastSchoolTeached');
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
