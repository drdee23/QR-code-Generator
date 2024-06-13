<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('organization_id')->references('id')->on('organisations')->onDelete('cascade');
        });

        Schema::table('event_personels', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });

        Schema::table('event_personels', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('q_r_codes', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
