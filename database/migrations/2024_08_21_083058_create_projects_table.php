<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('prj_id')->primary(); //XX00
            $table->string('prj_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->foreignId('organization')->constrained(table: 'organizations', column: 'org_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
