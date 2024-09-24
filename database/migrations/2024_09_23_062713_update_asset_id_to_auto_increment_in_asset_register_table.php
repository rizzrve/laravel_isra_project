<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('asset_register', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_id')->autoIncrement()->change();
        });
    }
    
    public function down(): void
    {
        Schema::table('asset_register', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_id')->change();
        });
    }
};
