<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('slug', 120)->unique();
            $table->text('description')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 120);
            $table->string('slug', 120)->unique();
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table): void {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->foreignId('author_id')->nullable();
            $table->timestamps();
        });

        Schema::create('post_categories', function (Blueprint $table): void {
            $table->foreignId('post_id')->index();
            $table->foreignId('category_id')->index();
        });

        Schema::create('post_tags', function (Blueprint $table): void {
            $table->foreignId('post_id')->index();
            $table->foreignId('tag_id')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
    }
};
