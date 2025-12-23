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
        Schema::table('destination_galleries', function (Blueprint $table) {
             $table->renameColumn('destintaion_id', 'destination_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destination_galleries', function (Blueprint $table) {
            $table->renameColumn('destination_id', 'destintaion_id');
        });
    }
};
