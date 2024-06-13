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
        Schema::create('q_r_codes', function (Blueprint $table) {
            $table->id();
            $table->string('qr_location', 100);
            $table->integer('event_id');
            $table->enum('status',['active', 'no_active'])->default('active');
            $table->enum('scanned',['yes', 'no'])->default('no');
            $table->integer('number_of_scans')->default(0);  
            $table->integer('scannedby')->default(0);          
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('q_r_codes');
    }
};
