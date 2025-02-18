<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image'); // Posteriormente añadiré nullable
            $table->string('price');
            $table->foreignId('instructor_id')->nullable()->constrained('instructors')->onDelete('set null');
            // Cada Activity tenga un Instructor, pero si un instructor se borra, la actividad no se elimina, sino que el campo instructor_id se pone en NULL
            $table->string('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
