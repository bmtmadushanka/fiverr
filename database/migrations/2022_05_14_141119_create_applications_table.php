<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('sr_number')->nullable();
            $table->string('letter_number')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('applicant_civil_id')->nullable();
            $table->string('request_date')->nullable();
            $table->string('action_taken')->nullable();
            $table->string('action_status')->nullable();
            $table->string('action_date')->nullable();
            $table->string('applicant_degree')->nullable();
            $table->string('applicant_academic')->nullable();
            $table->string('applicant_job_title')->nullable();
            $table->string('csc_organization')->nullable();
            $table->string('outgoing_letter_number')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_description')->nullable();
            $table->string('source_secreatary_name')->nullable();
            $table->string('secreatary_mobile')->nullable();
            $table->string('eligible_requests')->nullable();
            $table->string('current_request')->nullable();
            $table->string('remaining_request')->nullable();
            $table->string('additional_request')->nullable();
            $table->string('total_request')->nullable();
            $table->string('subject')->nullable();
            $table->string('from_sector')->nullable();
            $table->string('from_department')->nullable();
            $table->string('attachment')->nullable();
            $table->string('to_sector')->nullable();
            $table->string('to_department')->nullable();
            $table->string('general_notes')->nullable();
            $table->string('special_notes')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
