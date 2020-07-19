<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sy')->nullable();
            $table->string('sem')->nullable();
            $table->integer('grade_11')->nullable();
            $table->integer('grade_11_m')->nullable();
            $table->integer('grade_11_f')->nullable();
            $table->integer('grade_11_t')->nullable();
            $table->integer('grade_12')->nullable();
            $table->integer('grade_12_m')->nullable();
            $table->integer('grade_12_f')->nullable();
            $table->integer('grade_12_t')->nullable();
            $table->integer('grade_total_m')->nullable();
            $table->integer('grade_total_f')->nullable();



            $table->integer('abm')->nullable();
            $table->integer('abm_t_f')->nullable();
            $table->integer('abm_t_m')->nullable();
            $table->integer('abm_t')->nullable();

            $table->integer('humss')->nullable();
            $table->integer('humss_t_f')->nullable();
            $table->integer('humss_t_m')->nullable();
            $table->integer('humss_t')->nullable();


            $table->integer('stem')->nullable();
            $table->integer('stem_t_f')->nullable();
            $table->integer('stem_t_m')->nullable();
            $table->integer('stem_t')->nullable();


            $table->integer('bc')->nullable();
            $table->integer('bc_t_f')->nullable();
            $table->integer('bc_t_m')->nullable();
            $table->integer('bc_t')->nullable();


            $table->integer('gt')->nullable();
            $table->integer('gt_t_f')->nullable();
            $table->integer('gt_t_m')->nullable();
            $table->integer('gt_t')->nullable();

            $table->integer('fps')->nullable();
            $table->integer('fps_t_f')->nullable();
            $table->integer('fps_t_m')->nullable();
            $table->integer('fps_t')->nullable();

            $table->integer('hrs')->nullable();
            $table->integer('hrs_t_f')->nullable();
            $table->integer('hrs_t_m')->nullable();
            $table->integer('hrs_t')->nullable();

            $table->integer('css')->nullable();
            $table->integer('css_t_f')->nullable();
            $table->integer('css_t_m')->nullable();
            $table->integer('css_t')->nullable();

            $table->integer('tda')->nullable();
            $table->integer('tda_t_f')->nullable();
            $table->integer('tda_t_m')->nullable();
            $table->integer('tda_t')->nullable();


            $table->integer('ats')->nullable();
            $table->integer('ats_t_f')->nullable();
            $table->integer('ats_t_m')->nullable();
            $table->integer('ats_t')->nullable();


            $table->integer('eim')->nullable();
            $table->integer('eim_t_f')->nullable();
            $table->integer('eim_t_m')->nullable();
            $table->integer('eim_t')->nullable();

            $table->integer('epas')->nullable();
            $table->integer('epas_t_f')->nullable();
            $table->integer('epas_t_m')->nullable();
            $table->integer('epas_t')->nullable();


            $table->integer('rac')->nullable();
            $table->integer('rac_t_f')->nullable();
            $table->integer('rac_t_m')->nullable();
            $table->integer('rac_t')->nullable();

            $table->integer('strand_t_m')->nullable();
            $table->integer('strand_t_f')->nullable();
            $table->integer('strand_total')->nullable();

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
        Schema::dropIfExists('records');
    }
}
