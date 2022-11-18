<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companie_id')->nullable()->constrained();
            $table->foreignId('sector_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('grade_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('dni')->nullable()->unique();
            $table->string('cuil')->nullable()->unique();
            $table->string('address')->nullable();
            $table->boolean('resposablearea')->default(false)->nullable();
            $table->string('phone')->nullable();
            $table->date('datebirth')->nullable();
            $table->string('numberlegajo')->nullable();
            $table->date('datecompany')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('activo');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
