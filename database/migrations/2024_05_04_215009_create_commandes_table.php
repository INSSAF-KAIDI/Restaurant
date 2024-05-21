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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('NoCmd');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('NomClient')->nullable();
            $table->foreign('serveur_id')->references('id')->on('serveurs');
            $table->unsignedBigInteger('serveur_id')->nullable();
            $table->string('NomServeur')->nullable();
            $table->string('status')->nullable();
            
            $table->string('DateDemande')->nullable();
            $table->double('montant',10,2)->nullable();
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
        Schema::dropIfExists('commandes');
    }
};
