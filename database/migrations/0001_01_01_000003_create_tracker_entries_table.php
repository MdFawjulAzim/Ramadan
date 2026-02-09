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
        Schema::create('tracker_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('day'); // 1-30
            
            // Prayers (boolean checkboxes)
            $table->boolean('fajr')->default(false);
            $table->boolean('zuhr')->default(false);
            $table->boolean('asr')->default(false);
            $table->boolean('maghrib')->default(false);
            $table->boolean('esha')->default(false);
            $table->boolean('taraweeh')->default(false);
            
            // Quran
            $table->string('quran_tilawat')->nullable();
            
            // Habits (boolean pills)
            $table->boolean('hadith')->default(false);
            $table->boolean('sadka')->default(false);
            $table->boolean('durood')->default(false);
            $table->boolean('istigfaar')->default(false);
            $table->boolean('dua')->default(false);
            
            $table->timestamps();
            $table->unique(['user_id', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracker_entries');
    }
};
