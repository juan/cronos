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
        Schema::create('menu_opcions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained();
            $table->integer('numcolum')->nullable();
            $table->string('namemenu');
            $table->text('bigicon')->nullable();
            $table->text('smallicon')->nullable();
            $table->string('linkto')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_opcions');
    }
};
