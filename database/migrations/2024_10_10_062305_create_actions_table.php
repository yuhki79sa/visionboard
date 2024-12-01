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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('isshow')->nullable(true);
            $table->string('todo', 50);
            $table->foreignId('user_id')->constrained();
            $table->boolean('isDone')->nullable(true);
            $table->string('memo')->nullable(true); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
