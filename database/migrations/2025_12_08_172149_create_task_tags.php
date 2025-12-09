<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;
use App\Models\Tag;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->unique(['task_id', 'tag_id'], 'tag_task_unique')->primary();
            $table->unsignedBigInteger('task_id')->foreignIdFor(Task::class)->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('tag_id')->foreignIdFor(Tag::class)->constrained()->onDelete('cascade');
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
