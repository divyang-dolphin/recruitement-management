<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCandidatesChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('mobile_number')->nullable()->change();
            $table->string('alternative_mobile')->nullable()->change();
            $table->string('linkedin_profile')->nullable()->change();
            $table->string('hometown')->nullable()->change();
            $table->string('current_location')->nullable()->change();
            $table->string('experience')->nullable()->change();
            $table->string('selection_status')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->string('ctc')->nullable()->change();
            $table->string('expected_ctc')->nullable()->change();
            $table->string('notice_period')->nullable()->change();
            $table->string('dob')->nullable()->change();
            $table->string('maritial_status')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->text('candidate_remarks')->nullable()->change();
            $table->string('CV_status')->nullable()->change();
            $table->string('technicals')->nullable()->change();
            $table->string('practicals')->nullable()->change();
            $table->text('interviewer_remarks')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            //
        });
    }
}
