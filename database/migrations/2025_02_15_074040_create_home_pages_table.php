<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->string('video_id');
            $table->longText('biography_home');
            $table->longText('biography_footer');
            $table->longText('biography_about');
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->longText('address');
            $table->longText('map_address');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page');
    }
};
