<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('alternative_mobile');
            $table->string('linkedin_profile');
            $table->string('hometown');
            $table->string('current_location');
            $table->string('experience');
            $table->string('selection_status');
            $table->string('type');
            $table->string('ctc');
            $table->string('expected_ctc');
            $table->string('notice_period');
            $table->string('dob');
            $table->string('maritial_status');
            $table->string('gender');
            $table->text('candidate_remarks');
            $table->string('CV_status');
            $table->string('technicals');
            $table->string('practicals');
            $table->text('interviewer_remarks');
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
        Schema::dropIfExists('candidates');
    }
}
