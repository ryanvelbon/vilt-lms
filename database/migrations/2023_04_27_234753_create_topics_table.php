<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->foreignId('subject_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('parent_id')->nullable()->constrained('topics')->onDelete('CASCADE');
            $table->timestamps();

            $table->unique(['title', 'subject_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
