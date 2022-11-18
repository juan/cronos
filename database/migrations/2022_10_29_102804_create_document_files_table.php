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
        Schema::create('document_files', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('document_id')->constrained();
            $table->string('namefile',200);
            $table->boolean('requierefirma')->default(false)->nullable();
            $table->boolean('requiereconfirma')->default(false)->nullable();
            $table->string('status')->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_files');
    }
};
