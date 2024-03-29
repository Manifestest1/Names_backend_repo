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
        Schema::table('names', function (Blueprint $table) {
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('names', function (Blueprint $table) {
              $table->dropForeign(['religion_id']);
              $table->dropColumn('religion_id');
        });
    }
};
