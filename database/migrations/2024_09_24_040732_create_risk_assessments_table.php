<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskAssessmentsTable extends Migration
{
    public function up()
    {
        Schema::create('risk_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('threat_group_id');
            $table->unsignedBigInteger('threat_id');
            $table->unsignedBigInteger('vulnerability_group_id');
            $table->unsignedBigInteger('vulnerability_id');
            $table->integer('confidentiality');
            $table->integer('integrity');
            $table->integer('availability');
            $table->string('personnel');
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->string('likelihood');
            $table->string('impact');
            $table->string('risk_level');
            $table->string('risk_owner');
            $table->text('mitigation_option');
            $table->text('treatment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('risk_assessments');
    }
}
