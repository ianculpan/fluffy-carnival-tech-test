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
        Schema::create('task_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->foreignId('tasks')->constrained('tasks')->onDelete('cascade');
            $table->bigInteger('tag_id')->foreignId('tags')->constrained('tags')->onDelete('cascade');
            $table->bigInteger('user_id')->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
