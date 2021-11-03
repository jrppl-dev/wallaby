<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoggerLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logger_logs', function (Blueprint $table) {
            $table->id();
            $table->string("client_ip");
            $table->integer("client_port");
            $table->string("request_verb");
            $table->string("request_url");
            $table->string("request_params");
            $table->string("user_agent");
            $table->double("response_processing_time")->nullable();
            $table->text("response_data")->nullable();

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logger_logs');
    }
}
