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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_type_id')->constrained('test_types');
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->enum('type', [
                'true_false',
                'short_answer',
                'single_choice',
                'multiple_choice'
            ]);
            $table->text('explanation')->nullable();
            $table->enum('difficulty', ['easy','medium','hard'])->default('medium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
