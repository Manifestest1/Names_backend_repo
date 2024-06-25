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
        Schema::create('subgodnames', function (Blueprint $table) {
            $table->id();
            $table->string('subgodname');
            $table->unsignedBigInteger('god_id');
            $table->foreign('god_id')->references('id')->on('gods')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sungodname');
    }
};
