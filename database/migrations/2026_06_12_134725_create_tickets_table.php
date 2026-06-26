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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('no_antrian')->nullable();
            $table->string('catatan')->nullable();
            $table->date('tanggal');
            $table->enum('status', ['open','pending', 'called', 'done', 'cancel', 'close'])->default('open')->comment('Status antrian : open, pending, called, done, cancel, close');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
