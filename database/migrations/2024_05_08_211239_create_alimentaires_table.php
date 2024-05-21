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
        Schema::create('alimentaires', function (Blueprint $table) {
            $table->id();
            $table->foreign('category_alimentaire_id')->references('id')->on('category_alimentaires')->onDelete('cascade');
            $table->unsignedBigInteger('category_alimentaire_id')->nullable();
            $table->string('CategoryAlimentaire'); 
            $table->string('NomAlimentaire')->nullable(); 
            $table->string('description')->nullable(); 
            $table->string('status')->nullable();
            $table->string('image')->default('null');
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
        Schema::dropIfExists('alimentaires');
    }
};
