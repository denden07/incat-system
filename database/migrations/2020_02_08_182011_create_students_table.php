<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('extName')->nullable();
            $table->date('dob');
            $table->string('sex');
            $table->unsignedInteger('age');
            $table->string('religion')->nullable();
            $table->string('indigenous')->nullable();
            $table->string('mothertongue');
            $table->unsignedInteger('lrnStatus')->nullable();
            $table->string('lrnNo')->nullable();
            $table->string('psaNo')->nullable();
            $table->string('schoolYear1');
            $table->string('schoolYear12');

            $table->string('address');

            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('guardianName')->nullable();

            $table->string('parentCpNo')->nullable();
            $table->string('parentTpNo')->nullable();

            $table->string('lastGrade')->nullable();
            $table->string('lastSchoolYear')->nullable();
            $table->string('lastSchoolId')->nullable();
            $table->string('lastSchool')->nullable();
            $table->string('lastSchoolAddress')->nullable();


            $table->string('gradeLevel');
            $table->string('semester');
            $table->string('track');
            $table->string('strand');

            $table->string('status');
            $table->string('yearGraduate')->nullable();



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
