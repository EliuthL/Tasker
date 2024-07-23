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
        // Create relationship between labels and tasks
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('label_id')->nullable();
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key and column
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['label_id']);
            $table->dropColumn('label_id');
        });
    }
};