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
        Schema::create('app_configs', function (Blueprint $table) {
            $table->id();
            $table->string('instansi_name')->default('Kiosk Antrian');
            $table->text('instansi_address')->nullable();
            $table->string('instansi_phone')->nullable();
            $table->string('instansi_email')->nullable();
            $table->string('logo')->nullable();
            $table->string('active_theme')->default('default');
            $table->text('footer_text')->nullable();
            $table->string('social_media_facebook')->nullable();
            $table->string('social_media_instagram')->nullable();
            $table->string('social_media_twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_configs');
    }
};
