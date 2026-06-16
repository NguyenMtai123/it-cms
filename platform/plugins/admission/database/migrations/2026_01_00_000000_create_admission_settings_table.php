<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admission_settings', function (Blueprint $table) {

            $table->id();

            $table->string('title')
                ->default('Thông tin tuyển sinh');

            $table->string('banner_image')
                ->nullable();

            $table->string('career_image')
                ->nullable();

            $table->string('background_image')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_settings');
    }
};
