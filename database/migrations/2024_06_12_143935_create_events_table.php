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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('organisation_id');
            $table->enum('status',['active', 'no_active'])->default('active');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('number_of_qrs');  
            $table->text('description');
            $table->timestamps();
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
