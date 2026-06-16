<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {

            $table->unsignedBigInteger('page_id')
                ->nullable()
                ->after('type');

        });
    }

    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {

            $table->dropColumn('page_id');

        });
    }
};
