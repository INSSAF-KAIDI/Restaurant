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
    // LigneAchat:id_ligne_achat(pk),NoInvoice,id_fournisseur(fk),montant,date,status
    {
        Schema::create('ligne__achats', function (Blueprint $table) {
            $table->id();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs'); 
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->string('NomFournisseur')->nullable();
            $table->string('no_invoice')->nullable();
            $table->decimal('montant', 10, 2);
            $table->string('date')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('ligne_achats');
    }
};
