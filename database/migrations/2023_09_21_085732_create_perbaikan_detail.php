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
        Schema::create('perbaikan_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perbaikan_id')->constrained();
            $table->foreignId('armada_id')->constrained();
            $table->double('jumlah', 14, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikan_detail');
    }
};
