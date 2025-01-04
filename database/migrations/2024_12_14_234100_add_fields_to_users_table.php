<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // phone_number ustuni mavjud bo'lsa, uni qo'shishdan saqlanadi
        if (!Schema::hasColumn('users', 'phone_number')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone_number')->nullable();
            });
        }

        // boshqa ustunlar ham shunday qo'shilishi mumkin
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['student', 'landlord', 'family', 'individual', 'business'])->default('student');
            });
        }
    }

    public function down()
    {
        // bu ustunlarni tiklash
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('role');
        });
    }
    // /**
    //  * Run the migrations.
    //  */
    // public function up(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->string('phone_number')->nullable();
    //         $table->enum('role', ['student', 'landlord', 'family', 'individual', 'business'])->default('student');
    //         $table->string('profile_image')->nullable();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->dropColumn(['phone_number', 'role', 'profile_image']);
    //     });
    // }
};
