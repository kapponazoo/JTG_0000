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
                Schema::create('exhibitions', function (Blueprint $table) {
                    $table->id();
                    $table->string('title');
                    $table->date('start_date');
                    $table->date('end_date');
                    $table->foreignId('facility_id')->constrained('facilities');
                    $table->text('description')->nullable();
                    $table->text('organizer_profile')->nullable();
                    $table->text('exhibitor_profile')->nullable();
                    $table->boolean('is_for_sale');
                    $table->boolean('has_workshop');
                    $table->boolean('has_event');
                    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitions');
    }
};
