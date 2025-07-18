<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_digio', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('userid')->unique();
            $table->string('display_name')->nullable();
            $table->string('title', 550)->nullable();
            $table->string('group')->nullable();
            $table->string('dir')->nullable();
            $table->string('iss')->nullable();
            $table->string('aud')->nullable();
            $table->string('token', 1000)->nullable();
            $table->timestamp('jwt_exp')->nullable();

            // Status dan fitur tambahan
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_digio');
    }
};
