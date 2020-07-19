<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTeacherTable extends Migration
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
            $table->string('religion')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('expertise')->nullable();
            $table->string('sex');
            $table->string('status')->nullable();
            $table->string('lastSchoolAttended')->nullable();
            $table->string('award')->nullable();
            $table->string('extensionName')->nullable();
            $table->string('lastSchoolTeached')->nullable();
            $table->string('vocational')->nullable();
            $table->string('postGraduate')->nullable();
            $table->string('marital')->nullable();
            $table->string('position')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('station_id')->nullable();
            $table->string('umid_id')->nullable();
            $table->string('phil_health')->nullable();
            $table->string('pag_ibig')->nullable();
            $table->string('gsis_id')->nullable();
            $table->string('prc_id')->nullable();
            $table->date('date_appointed')->nullable();
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
