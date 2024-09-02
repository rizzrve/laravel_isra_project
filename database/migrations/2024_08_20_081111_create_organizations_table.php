<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->unsignedBigInteger('org_id')->primary();
            $table->string('org_name')->nullable();
            $table->binary('org_logo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization');
    }
};
