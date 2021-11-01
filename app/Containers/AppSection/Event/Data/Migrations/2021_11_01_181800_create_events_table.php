<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
}
