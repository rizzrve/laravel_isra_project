<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrgIdInOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->id('org_id')->change(); // This makes `org_id` auto-incrementing
        });
    }

    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->integer('org_id')->change(); // Revert changes if necessary
        });
    }
};


