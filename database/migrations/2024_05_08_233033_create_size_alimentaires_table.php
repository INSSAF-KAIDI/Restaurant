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
    // SizeAlimentaire:,id_alim(fk),id_size(fk),prix..
    public function up()
    {
        Schema::create('size_alimentaires', function (Blueprint $table) {
            $table->id();
            $table->foreign('alimentaire_id')->references('id')->on('alimentaires');
            $table->unsignedBigInteger('alimentaire_id')->nullable();
            $table->string('NomAlimentaire')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->string('taille')->nullable();
            $table->double('prix',10,2)->nullable();
            $table->string('status')->nullable();
            
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
        Schema::dropIfExists('size_alimentaires');
    }
};
