<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalDetailsToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
            
            $table->string('religion')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('expertise');
            $table->string('sex');
            $table->string('status')->nullable();
            $table->string('lastSchoolAttended')->nullable();
            $table->string('award')->nullable();
            $table->string('extensionName')->nullable();
            $table->integer('nso')->nullable();
            $table->integer('transcript')->nullable();
            $table->integer('let')->nullable();
            $table->integer('prc')->nullable();
            $table->integer('coe')->nullable();
            $table->integer('certificates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            //

        });
    }
}
