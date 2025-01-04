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
        Schema::create('houses', function (Blueprint $table) {
            $table->id(); // id BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('landlord_id'); // landlord_id BIGINT NOT NULL
            $table->string('title', 255); // title VARCHAR(255) NOT NULL
            $table->text('description')->nullable(); // description TEXT
            $table->string('address', 255); // address VARCHAR(255) NOT NULL
            $table->string('city', 100)->nullable(); // city VARCHAR(100)
            $table->decimal('price', 10, 2); // price DECIMAL(10, 2) NOT NULL
            $table->enum('house_type', ['apartment', 'villa', 'studio', 'shared_room', 'office']); // ENUM
            $table->integer('max_occupants')->default(1); // max_occupants INT DEFAULT 1
            $table->date('available_from')->nullable(); // available_from DATE
            $table->json('amenities')->nullable(); // amenities JSON
            $table->timestamps(0); // created_at & updated_at

            // Foreign key constraint
            $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
