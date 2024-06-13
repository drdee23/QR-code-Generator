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
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('middle_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->string('phone_number', 100)->nullable();
            $table->enum('gender',['male', 'female'])->nullable();
            $table->date('dob')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->text('address')->nullable();
            $table->string('photo', 100)->nullable();
            $table->enum('blood_group',['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
