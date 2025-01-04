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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->string('name', 100); // name VARCHAR(100) NOT NULL
            $table->string('email', 100)->unique(); // email VARCHAR(100) UNIQUE NOT NULL
            $table->string('password', 255); // password VARCHAR(255) NOT NULL
            $table->string('phone_number', 15)->nullable(); // phone_number VARCHAR(15)
            $table->enum('role', ['student', 'landlord', 'family', 'individual', 'business'])->default('student'); // ENUM
            $table->string('profile_image', 255)->nullable(); // profile_image VARCHAR(255)
            $table->timestamps(0); // created_at & updated_at TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
