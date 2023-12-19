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
            $table->id('Id_User');
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->string('Email', 50)->unique();
            $table->string('Password', 50);
            $table->string('Phone', 50)->nullable();
            $table->boolean('Admin')->default(false);
            $table->timestamps();
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
