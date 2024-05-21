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
    // CommandeAlimentaire:,id_cmd(fk),id_size_alim(fk), id_alim(fk),montant, quantite
    public function up()
    {
        Schema::create('commande_alimentaires', function (Blueprint $table) {
            $table->id();
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->double('NoCmd')->nullable();
            $table->foreign('alimentaire_id')->references('id')->on('alimentaires');
            $table->unsignedBigInteger('alimentaire_id')->nullable();
            $table->string('NomAlimentaire')->nullable();
            $table->foreign('size_alimentaire_id')->references('id')->on('size_alimentaires');
            $table->unsignedBigInteger('size_alimentaire_id')->nullable();
            $table->double('prix')->nullable();
            $table->integer('quantite')->nullable();
            $table->double('montant')->nullable();
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
        Schema::dropIfExists('commande_alimentaires');
    }
};
